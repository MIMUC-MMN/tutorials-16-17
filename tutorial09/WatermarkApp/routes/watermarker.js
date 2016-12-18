/**
 * Created by Tobi on 17.12.2016.
 */

var express = require('express');
var router = express.Router();
var path = require('path');
var Jimp = require('jimp');
var fs = require('fs');

var watermarkedImagesDirectory = path.join(__dirname, '../watermarks');
var publicImagesDirectory = '../public/images';

var watermark; // holds the Jimp image
var watermarkPath = path.join(__dirname, '../public/images/watermark.png');

// first, make sure that the directory exists.
if (!fs.existsSync(watermarkedImagesDirectory)) {
  fs.mkdirSync(watermarkedImagesDirectory);
}


Jimp.read(watermarkPath, function (err, img) {
  watermark = img;

  // you actually can register routes within *callbacks*
  router.use('/images/:image', function (req, res, next) {
    var imagePath = path.join(__dirname, publicImagesDirectory, req.params.image);
    var markedPath = path.join(watermarkedImagesDirectory, 'wm-' + req.params.image);

    var imageWrittenCallback = function () {
      res.sendFile(markedPath);
    };

    var imageCompositedCallback = function (err, img) {
      if (err) throw err;
      img.write(markedPath, imageWrittenCallback);
    };

    if (fs.existsSync(imagePath)) {
      console.log('image ' + imagePath + ' exists');

      Jimp.read(imagePath, function (err, img) {
        if (err) throw err;
        var x = 0, y = 0;
        img.composite(watermark, x, y, imageCompositedCallback)
      });
    } else {
      console.log(imagePath + ' does not exist');
      // don't send the response, just pass it through
      next();
    }
  });
});

module.exports = router;
