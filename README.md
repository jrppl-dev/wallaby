<p align="center">
	<a href="https://www.hostelworldgroup.com/">
		<img width="700px" 
			 src="https://www.hostelworldgroup.com/~/media/Images/H/Hostelworld-v2/logo/hostel-group-logo.svg?la=en" >
	</a>
</p>

<h3 align="center">THE CHALLENGE</h3>

## <a name="Purpose">Purpose</a>

- [ ] Evaluate your coding abilities
- [ ] Share your technical experience
- [ ] Understand how you design a solution

## <a name="Introduction">Introduction</a>

Create a API that will be used to search for events in a specific city or country. Only authenticated users can use
this.

Example of Event object

```
{
    "Id": 1
    "Name": "name of event",
    "City": "city of event",
    "Country": "country of event",
    "StartDate": "2021-01-01",
    "EndDate": "2021-01-01"
}
```

## <a name="Details">Details</a>

* Create an endpoint that will be used to make authentication and will return a token to be used on others endpoints.
    * The user information should be stored in a DB of your choice.
* Create endpoint that will be able to search events.
    * The data can be found attached to this email; treat it as an API.
    * The parameters that we should accept is a “term” that should search something similar from City and Country, and a
      parameter to search per “date”.
* “term” What we want to search
    * We should look for something similar on city and country field
    * “date” Accept only valid dates
    * No past dates allowed
    * Both parameters can work together.
    * We should accept only valid dates.
* This endpoint requires authorisation.
    * Log every call to this endpoint.
    * If we match anything in our search, we should return the list of objects found.

## <a name="Hints">Hints</a>

* Show your overall solution design
* Some testing, unit and/or integration
* Swagger Documentation for the endpoints created

<h3 align="center">THE SOLUTION</h3>

## <a name="Introduction">Introduction</a>


