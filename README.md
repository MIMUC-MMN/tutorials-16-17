# tutorials-16-17
Code examples for Online Multimedia in the winter term 2016 / 2017

## How To Conveniently Get Tutorial Material ##

A step by step guide.

1. Install git -- http://git-scm.com 
2. Open Git Bash (Windows) or a Terminal (Linux/macOS)
3. Type `cd && mkdir mmn && cd mmn`. This will create a new Directory called "mmn" in your
home folder and then step into it.
4. Type `git clone git@github.com:MIMUC-MMN/tutorials-16-17.git`. If you are asked if you 
want to trust the server with the signature, type `y` or just hit `Enter`
5. Type `cd tutorials-16-17`
6. Type `pwd`. This will show you the path of the local repository, so something like this:
 `/Users/<your user name>/mmn/tutorials-16-17`
7. Next time you want an update of the materials, just do open a terminal and do this
 `cd /Users/<your user name>/mmn/tutorials-16-17 && git pull`
 
### Troubleshooting ###

- If you can't pull because "some changes would be overwritten by merge", do this:
 ```
 $ git stash
 $ git pull
 $ git stash pop
 ```
 This will store your modifications temporarily and then restore them after the pull.
 If that doesn't work, you'll have to commit your changes and then merge with a merge tool. 

- again, if we can help in any way, please pull our sleeves on Slack. 

## Requirements ##
Please go through [the required tools](./requirements.md) to make sure you have everything set up for the tutorials.