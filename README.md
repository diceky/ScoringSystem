# ScoringSystem
Google Spreadsheet-based online scoring system for contests and competitions using Google Drive API and PHP

## System Structure
* index.php: page to be shared to judges
* form.php: each judge inputs their scores in their individual page
* post.php: updates Google Spreadsheet with the input scores using Google's Drive API
* results/index.php: collects data from Google Spreadsheet to show top 3 teams

## Requirements
* In Google Cloud Console
	* Create a new project
	* Enable Drive API
	* "Create Credentials" ->  Service Account Key -> Create P12 Key under "App Engine default sevice account" -> Save that P12 key safely
* Create a new spreadsheet and share it with the App Engine default service account (usually it's "********@appspot.gserviceaccount.com", you can check in Google Cloud Console under "IAM & Admin")
* replace ***** with yours in post.php
```
$G_CLIENT_ID = 'xxxxxxxxxxxxxxxxxxxxxxxx.apps.googleusercontent.com';
$G_CLIENT_EMAIL = 'xxxxxxxxxxxxxxxxxxxxx@appspot.gserviceaccount.com';
$G_CLIENT_KEY_PATH = 'xxxxxxxxxxxxxxxxxx.p12';
```
