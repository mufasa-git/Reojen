
Git global setup

```
git config --global user.name "ITSL Admin"
git config --global user.email "sumanta.ghosh+gitlabadmin@infoway.us"
```

Create a new repository

```
git clone git@223.31.110.165:php/reojen.git
cd reojen
touch README.md
git add README.md
git commit -m "add README"
git push -u origin master
```

Existing folder

```
cd existing_folder
git init
git remote add origin git@223.31.110.165:php/reojen.git
git add .
git commit
git push -u origin master
```

Existing Git repository

```
cd existing_repo
git remote add origin git@223.31.110.165:php/reojen.git
git push -u origin --all
git push -u origin --tags
```
