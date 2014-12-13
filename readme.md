## Ishu

Ishu (pronounced issue) provides a small Laravel based application that will 
pipe support tickets and/or bug reports directly into your systems such as 
Gitlab Issues.

The Connections are easily added and it's trivial to write new ones. This means
that from one single entry point you can alert many systems to an issue.

The next two planned Connections are to Pushover and Helpscout.

## Installation

Clone this repository, then `composer install`. 

Copy the sample `.env.sample` file to `.env` and set accordingly to your needs. 

Point your web server at the public folder.
