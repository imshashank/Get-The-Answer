# Get the Answer

Get the Answer was a HackIllinois 2014 prototype that turned a photo of an object into context about it. The [original Devpost entry](https://devpost.com/software/get-the-answer) records the demo, team, and Best Use of Data award.

## How the prototype worked

1. A camera image went to CamFind for object recognition.
2. AlchemyAPI categorized the result and extracted the key concepts.
3. The prototype used those concepts to look up related questions and reference data through Answers.com and Wolfram Alpha.

The PHP source and [original setup notes](README.txt) remain here as a record of the hackathon build. The notes already identify a retired dependency, and the original integrations have not been verified against current services.

## Team credit

[Shashank Agarwal](https://www.linkedin.com/in/shashankagarwal2/) was a member of the project team. See the [Devpost credits](https://devpost.com/software/get-the-answer) for the full team.
