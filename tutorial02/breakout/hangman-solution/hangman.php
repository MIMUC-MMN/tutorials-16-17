<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hangman</title>
    <meta name="author" content="Tobias Seitz">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="hangman.css">
</head>
<body>

<div id="container">
    <h2>Hangman - the game.</h2>
    <section id="output">
        <?php

        $secretWord = 'MultimediaImNetz';
        $wordLength = strlen($secretWord);
        $maximumAttempts = 12;

        /**
         * Use this function to lazily instantiate a session-variable if it's not there yet.
         *
         * @param $key {string} session-variable key, preferably a string
         * @param $value {*} the value to initialize the variable with, e.g. array(), 1, ''
         */
        function lazyInitSessionVariable($key, $value)
        {
            if (!isset($_SESSION[$key])) {
                $_SESSION[$key] = $value;
            }
        }

        // reset the guesses.
        if (isset($_POST['reset'])) {
            $_SESSION = array();
        }

        // actually initialize the session variables
        // valid and invalid attempts.
        lazyInitSessionVariable('hits', array());
        lazyInitSessionVariable('misses', array());

        // handle a valid guess.
        if (isset($_POST['guess']) && isset($_POST['letter'])) {
            $letter = strtoupper(substr($_POST['letter'], 0, 1));

            // determine if we should move the progress forward.
            if (stristr($secretWord, $letter)) { // true means: secretWord contains the letter.
                // save the letter in the 'hits' list;
                $_SESSION['hits'][$letter] = true;
            } else {
                // save the letter in the 'misses' list;
                $_SESSION['misses'][$letter] = true;
            }
        }

        // start the game progress at 1 (not 0).
        // but since the first miss should already advance the progress, we need to add +1;
        $progress = count($_SESSION['misses']) ? count($_SESSION['misses']) + 1 : 1;

        // if you want to make the game harder, you can start it at a later stage
        // by adding a handicap to the progress.
        $handicap = 0;
        $progress += $handicap;

        $imageFile = 'hangman';
        // determine which of the 12 hangman files we pick.
        // if the progress is below 10, we need to prefix a '0' to the number.
        $imageFile .= $progress < 10 ? "0{$progress}.png" : "$progress.png";

        // show the image:
        echo "<img src='{$imageFile}' alt='Hangman - Step $progress' class='hangman'/>";

        // reveal the letters inside the 'result' div.
        echo '<div class="result">';
        // if the progress is smaller than a predefined number of attempts ==> we can play on.
        if ($progress < $maximumAttempts) {
            // keep a record of the guessed word;
            $guessedWord = '';
            // we go through each letter of the secret word and see if it's a hit or a miss.
            for ($i = 0; $i < $wordLength; $i++) {
                // make sure we use the uppercase version of the letters.
                $charAtI = strtoupper(substr($secretWord, $i, 1));

                // case 1: the letter of the word is in the guess array --> reveal the letter
                if (isset($_SESSION['hits'][$charAtI])) {
                    $guessedWord .= $charAtI;
                } // case 2: the letter was not guessed yet --> add an underscore
                else {
                    $guessedWord .= '_';
                    // print an underscore for each character in the word.
                }
            }

            // let's see of the word was correct.
            if (strtoupper($guessedWord) == strtoupper($secretWord)) {
                echo '<div class="success">Yes! You Won!</div>';
                echo '<div>'.$secretWord.' was the secret Word.</div>';
                $_SESSION = array();
            } else {
                // first show the current status:
                echo implode(' ', str_split($guessedWord));


                // now, to be a little more usable, show which letters were already guessed;
                if (count($_SESSION['misses'])) { // only give feedback, if there misses.
                    echo '<div class="misses">Those letters are wrong: ';
                    foreach ($_SESSION['misses'] as $miss => $status) {
                        echo $miss . ' ';
                    }
                    echo '</div>';
                }
            }
        } else { // oh no, the user lost!
            echo "<div class=\"youlose\"><h3>Oh No!</h3><p>You lost. The solution was \"$secretWord\". </p></div>";
            $_SESSION = array();
        }

        echo '</div>'; # .result
        ?>
    </section>
    <section id="formContainer">
        <form method="post" action="hangman.php">
            <input type="text" maxlength="1" minlength="1" name="letter"/>
            <button type="submit" name="guess">Guess</button>
            <button type="submit" name="reset">Reset</button>
        </form>
    </section>
</div>

</body>
</html>