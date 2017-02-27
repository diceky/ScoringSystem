# ScoringSystem
Online scoring system app for contests and competitions using Google Spreadsheet API and PHP

## System Structure
* index.php: page to be shared to judges
* form.php: each judge inputs their scores in their individual page
* post.php: updates Google Spreadsheet with the input scores using Google's Drive API
* results/index.php: collects data from Google Spreadsheet to show top 3 teams