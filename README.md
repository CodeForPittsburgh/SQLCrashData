# SQLCrashData
## Maps and data for Bike Crashes
Code for Pittsburgh is working on displaying crash data

Started by Mark Howe @mhowe0422 with @bikepgh

Data is from 

https://data.wprdc.org/dataset/allegheny-county-crash-data

and uses only Bike Crash information

This is a work in progress.

http://web-pblotter-v1-elb-1058384347.us-west-2.elb.amazonaws.com/SQLCrashData/

With a heat map at

http://web-pblotter-v1-elb-1058384347.us-west-2.elb.amazonaws.com/SQLCrashData/CrashHeatMap.php

## Change requests

1) Display by year

2) Display by severity

3) Better GUI

4) Like to merge the county and city json shape data to allow the city neighborhoods to work during the mouse roll-over.


## Application notes

These maps are based on the Google Map API

The current API key is registered to mhowe so if you clone/copy the code please use
your own API key.

The code is split out to html (View) and the code for the javascript (Model and Controller) in a seperate file.

The main map display is index.php and based on bootstrap.js.

Used fixed xml file for the data that has the addresses already geo-coded

There are a number of bak named files. They will be cleaned up shortly.
