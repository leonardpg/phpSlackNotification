# phpslacknotification
Very simple wrapper to the Slack Incoming Message API endpoint. Suitable for use in projects that need to push messages to a Slack channel. See https://api.slack.com/ for more information about how to set up a Slack app.

## Properties

* url
> The url of your Incoming Notification endpoint in your Slack app. See the api link above for more info.

* message
> The text message to send to the Slack channel.

* responseCode
> The HTTP response code returned by slack.

## Methods

* setURL
> Sets the url endpoint.

* setMessage
> Sets the message to be posted to Slack.

* setResponseCode
> Sets the response code. Call this after the 'send' method to store the HTTP response code from the response.

* getURL
> Retrieves url endpoint.

* getMessage
> Retrieves the message.

* getResponseCode
> Retrieves the response code of the HTTP response from Slack.

* send
> Uses Curl to post to your incoming hook url.
