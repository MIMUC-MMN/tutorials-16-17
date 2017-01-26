/**
 * Created by Tobi on 28/11/2016.
 */

var express = require('express');
var router = express.Router();
var uuid = require('uuid');

/**
 * this is our dummy database.
 * Upon program launch, it will definitely contain two products with id_a and id_b
 * @type {{id_A: {name: string, price: number}, id_B: {name: string, price: number}}}
 */
var products = {
  'id_A': {
    name: 'Product A',
    price: 30
  },
  'id_B': {
    name: 'Product B',
    price: 50
  }
};

/**
 * retrieve all products.
 */
router.get('/', function(req, res) {
  var productArray =
    Object.keys(products).map(function(key) {
      var entry = products[key];
      entry.id = key;
      return entry;
    });
  var response = {
    code: 200,
    products: productArray
  };
  res.json(response);
});

/**
 * retrieve specific product by ID
 */
router.get('/:id', function(req, res, next) {
  var response = {
    id: req.params.id,
    products: []
  };
  var product = {};
  if (req.params.id) {
    if (products[req.params.id]) {
      product.id = req.params.id;
      // create a copy:
      Object.keys(products[req.params.id]).forEach(function(key) {
        product[key] = products[req.params.id][key];
      });
      response.products.push(product);
    }
  } else {
    // just send all products
    response.products = products;
  }
  res.json(response);
});

/**
 * create and insert a new product
 * the product is passed in the http body and
 * needs to contain a name and a price property.
 */
router.post('/', function(req, res) {
  var entry, id, response;
  if (req.body.name && req.body.price) {
    id = uuid.v1();
    entry = {};
    entry[id] = {
      id : id,
      name: req.body.name,
      price: req.body.price
    };
    products[id] = entry[id];
    response = {
      code: 201,
      message: 'created product',
      products: [entry]
    };
  } else {
    response = {
      code: 1000,
      message: 'missing parameter. required: name, price.'
    }
  }
  res.json(response);
});


/**
 * Replace a product with a given ID
 * We only perform the replacement, if the new product has at least
 * a price and a name.
 */
router.put('/:id', function(req, res, next) {
  var response;
  if (req.params.id && products[req.params.id] && req.body.name && req.body.price) {
    // update the product
    products[req.params.id] = req.body;
    response = {
      code: 201,
      message: 'product updated',
      product: products[req.params.id]
    };
  } else {
    response = {
      code: 1000,
      message: 'missing parameter or resource not found.'
    }
  }
  res.json(response);
});


/**
 * update a product with a given ID
 */
router.patch('/:id', function(req, res) {
  var response, product, entry;
  if (req.params.id && products[req.params.id]) {
    product = products[req.params.id];
    product.id = req.params.id;
    // overwrite only the passed keys.
    Object.keys(req.body).forEach(function(key) {
      product[key] = req.body[key];
    });
    response = {
      code: 201,
      message: 'ok',
      products: [product]
    };
  } else {
    response = {
      code: 1000,
      message: ''
    }
  }
  res.json(response);
});


/**
 * delete a product with a given ID
 */
router.delete('/:id', function(req, res, next) {
  var entry;
  if (req.params.id) {
    if (products[req.params.id]) {
      entry = {};
      // to preserve the object for the response
      // this is a little more tricky, because
      // many calls are by reference in javascript.
      // so, we need to create a deep copy.
      entry[req.params.id] = {};
      Object.keys(products[req.params.id]).forEach(function(key) {
        entry[key] = products[req.params.id][key];
      });
      // now it's safe to delete the product.
      delete products[req.params.id];
      res.json({
        code: 201,
        message: 'Product deleted',
        products: [entry]
      });
    } else {
      res.json({
        code: 1000,
        message: 'Product not found.'
      })
    }
  } else {
    res.json({
      code: 1000,
      message: 'missing parameter "id"'
    });
  }
});


/**
 * repond to AJAX pre-flight requests.
 */
router.options('/', function(req, res) {
  // this is often necessary for CORS.
  res.header('Access-Control-Allow-Methods: *');
  res.end();
});

module.exports = router;