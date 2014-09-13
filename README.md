sportsbook-json-php
===================

Example code to work with the Sportsbook Software JSON API using PHP.

Information
===================

Every sportsbook user account may be used to submit API calls to our API. Using this API you can query for sportsbook transaction history, bets, winnings, casino game plays, account information, poker history, deposits and more.

It is also possible to browse sportsbook market data in JSON or XML format. You can query for sports, leagues, events, bets and bet types. When sending queries, you can also specify filters such as :

sport = 1

To drill down through data or find specific records to monitor for updates, such as for instance the case with sportsbook bets, where prices might change several times per minute on occasion.

The filters*.php files show practical examples to browse through market data and interpret resulting JSON structure. 



Notice
===================

API access is free for all but may be throttled in case of high traffic. Sportsbook market data API functions (sport, league, event, prop) are subject to limits and quotas and require a data subscription. 
Please contact sales to sign up for an one week integration trial and choose a subscription plan. To learn more about our <a href="http://www.sportsbooksoft.com">sportsbook software</a> data subscription plans please visit this page:

http://www.sportsbooksoftware.com/sportsbook-market-feeds/


API notes
===================

This is a proof of concept demonstration of the v2 JSON API by Entertastic that introduces the concept of dynamic faceted search. You can use the sandbox below to submit JSON requests to the local installation or (simple GET) remote requests via cross-domain JSONP requests against the Betvolt.com database.

If however you do have a solid reason to program on the server side, you can consume all these services on the server side as well. Any programming language has JSON and data serialization support.

Private services: When consuming private services always include the headers returned by the login service. The API operates based on regular user sessions as managed by the front-end, this means that once an user is logged in to the website the private calls become accessible along with the rest of the visual front-end.

At this time all queries are limited to 100 results and ordered by ID descending in order to return the latest results. Conditions should be used to step through blocks of 1000 records per service call.

At this time the API provides only read-only services. The final version of the API (along with write privileges on bets, users and transactions) is due to replace the current separate market browser and account APIs by the end of December 2014.

When testing JSON calls you have to use an user account created under the current domain name. JSONP calls will work accross domains however you must make sure the JSONP call contains an authentication hash for an user belonging to the domain name you're sending the request to.
