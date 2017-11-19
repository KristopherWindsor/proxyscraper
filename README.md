# Proxyscraper
Finds new Craigslist posts via RSS feeds and downloads the posts. (This could
work for other sites if they are similar to Craigslist's format.) When scraping
at high volume, multiple IP addresses need to be used to work around IP
banning.

Uses a server/client model where clients ask the server what should be scraped.
The clients scrape using their own IP or via proxy servers and then send their
scraped pages back to the server.

Ideally, your proxy work will be handled by multiple proxy servers, AWS-type
servers, plus local servers, so the service is uninterrupted when one server or
proxy site is blocked.
