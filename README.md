Prototype: [http://onespring.net/projects/foodrecalls/](http://onespring.net/projects/foodrecalls/)

# Food Recall Dashboard - Pool 1 Design

## Introduction
The prototype was designed and developed by [OneSpring LLC](http://onespring.net/) using open source technology, user experience best practices and OpenFDA datasets and API. The team used a Lean and Agile Scrum approach to designing and developing the prototype. To learn more about our process, view our [Design Approach](https://github.com/onespring/foodrecalls/blob/master/design_approach/OneSpring_Design_Approach.pdf) material.

## Overview
The Food Recall Dashboard is an interactive tool that allows consumers to quickly and easily learn about food recalls by manufacturer, region, and level of severity. OneSpring LLC design the 

## Background
A multi-disciplinary team was formed to investigate how readily available data and the latest technologies could help the public become more informed about Food Recalls. After conducting user research, the team learned that consumers want a fast and simple means to learn about food product recalls that are pertinent to them. Consumers want to know what are the serious recalls, where are they happening, and who’s responsible.

## Features
For the initial Minimal Viable Product (MVP) release of the Food Recall Dashboard, the team provided the following features:

*	Dashboard view of core food recall information by food, manufacturer, severity, and region
*	One-click access to additional food recall details
*	Ability to search on recalls by manufacturer, U.S. state, and severity
*	Responsive design for optimal viewing on multiple devices
*	Ability to minimize and customize the layout position of dashboard modules
*	508 Compliance

## Technical Details
Food Recall Dashboard is an open source project built using modern technologies that allow it to run on any device with a web browser. The user interface was designed referencing the Google Android Design Pattern Library and developed using [Bootstrap](http://getbootstrap.com/) and the charts using the [D3 Chart Library](http://d3js.org/). All food recall datasets are provided through the [openFDA](https://open.fda.gov/) API.

## Approach
1. **Team & Plan** - A multi-disciplinary team with a Product Manager, Interaction Designer, Visual Designer, and Front-End Web Developer was formed at the outset of the project. The team established a 1-week targeted plan with the goals of designing, coding, testing, and delivering an MVP by end of week. 

2. **User Research** - The team conducted user research with a group of three external consumers to learn and identify needs. The team learned about FDA food recall needs and identified prototype features with the group.

3. **Card Sort** - Based on the findings, the team conducted a card sort session to organize and prioritize the identified features.

4. **Product Backlog & Sprint Planning** - From the feature list, user stories were written with acceptance criteria and the team began to create the initial product backlog. The product manager prioritized the backlog based on business and technology needs. The development team established the story points to determine the level of effort for the 1-week Sprint.

5. **Sketching & Visualization** - The team began sketching and visualization of the user stories to help determine the initial Product Design Concepts. From this session, three concepts were created for consumer review.

6. **Product Design Concept Peer Review** - The team conducted a Peer Review of the three Product Design Concepts with the consumer group for feedback. During the session, the team updated the most preferred Product Design Concept on the fly to immediately validate the group’s feedback in real time.

7. **Development Deep Dive** - Based on the feedback, the team refined the visualization and made decisions for creating a responsive design prototype using Bootstrap and Google Android design patterns and D3 Chart Library for the user interface. Coding began by utilizing the datasets and API from openFDA.

8. **Usability Testing** - The team conducted two rounds of Usability Testing with stakeholders/consumers for feedback, refinement, and to ensure 508 Compliance.

9. **End of Sprint Review & Push to Production** - Upon successful testing and iteration, the team conducted an End of Sprint Review to demonstrate the working prototype and supporting documentation. The team gained approval to push the code to production and post all supporting documentation.  The product backlog was updated to reflect completed User Stories and the development team calculated the team’s initial velocity.

## Supporting Documentation
Additional documentation describing our 1-week Sprint from start to publish is available at the OneSpring GitHub repository under [Design Approach](https://github.com/onespring/foodrecalls/blob/master/design_approach/OneSpring_Design_Approach.pdf).

## Publishing the Prototype
The easiest way to deploy the Food Recalls Dashboard prototype is to clone the entire repository and navigate to the root of the site to start using the tool. You can also download the ZIP file and place the project on a web server such as Apache or IIS.