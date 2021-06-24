# CerealGreen

A web platform built as a Minimum Viable Product for the Hackathon hosted by the company SocialLibreria in 2019, built through the cooperation of 2 students from the Computer Science Bachelor course and 2 students from the Business and Economics Master course from University of Insubria (Varese, Italy).
The platform has been built using the CakePHP framework and MySQL.
It is an information system, used internally by a fictional multinational company to address the sale cycle across different departments.
It was developed rapidly through prototypes over the course of 2 weeks.

## The company
The (fictional) company imports cereals from the USA, processes and resell them in Italy, both online and through retailers (defined as "Product A").
The company also produces food suitable to the needs of celiac people (defined as "Product B").
With the production waste, the company produces animal feed (defined as "Product C").

The company is divided in different departments, but for the challange we'll be focusing only on the Sales one.
This department has the following hierarchy:
 - General manager, who is responsible for the whole Sales department
 - Division manager, who is responsible for the sale of a specific product
 - Sellers/Retailers

![The Sales Department hierarchy](http://drive.google.com/uc?export=view&id=1N5o9PE1OMaBCPr3F7xmLOA-pqNCPn4bp "Sales Department hierarchy")

## Requirement analysis
The challange focused on designing and developing an IS that could be used by the Sales department to allow top-down, bottom-up and horizontal information flow.


### Top-Down information flow
After they have considered the amount of available product, the general manager splits the amount of expected sales and assigns to each division manager the amount to be sold.

Each division director does the same towards the retailers.

### Bottom-up information flow
Each retailers generates a report based on the information received by their director (e.g. amount of products to sell, amount of products sold, sale price) and sends the information to their own director.

The division manager receives the reports from the retailers and they can approve them as they are or they can modify them (e.g. fixing some mistake) before approval.
Then they can generate a report that summarises their resellers' activity.
This is a report that is automatically generated and that is subsequently visible to the General manager.

ONLY during shock cases (e.g. flooded areas, theft, a fire in the shop), retailers have a direct communication channel with the General manager, to avoid the lenghtening of the time required to process and pass the information up in the hierarchy.

### Horizontal information flow
The Sales General Manager is notified by the Production General Manager about the quantity of products that are available for sale.
Different General managers can also notify each others with summary reports of the shock case events that happened in their respective departments.

The Division Managers can notify each others about a surplus or a lack of economical resources.

### Information exchanged
The features with a check sign are those that have been selected to be part of the MVP.

From the General Manager to the Division Manager:
 - [x] type of product
 - [x] number of batches to sell of the specific product
 - [x] number of batches to reserve for the online market
 - [ ] sale provisions for the physical market
 - [ ] sale provisions for the online market
 - [x] ordinary reference date of the batch
 - [x] production date of the batch
 - [x] expiry date of the batch
 - [x] (Only for product C) phytosanitary information and packaging provisions of the batch
 - [ ] possible product surplus

From the Division Manager to the Retailers (allocation of the products to sell): 
 - [x] amount of the specific product
 - [x] advised price
 - [x] production date of the product
 - [x] expiry date of the product
 - [x] which specific product to focus the sales on

From the Retailers to the Division Manager:
 - [x] product sale report
 - [x] extraordinary loss (theft, bad storage management, etc.)
 - [ ] complaints and tips from customers
 - [ ] sale notes about products, other tips
 - [ ] possible problems face with the supply (broken packaging, spoiled goods, etc.)

From the Division Manager to the Retailers:
 - [x] report of the sales by product and geographical area
 - [ ] list of the costs of the physical/online markets
 - [ ] online sale reports (most searched product, reviews and ratings, etc.)

From the Retailers to the General Manager:
 - [x] type of schock event: earthquake, unavailable premises, theft, arson, cyberattack, data theft, spoiled product, intoxications, molds or fungi, more (with its actual description)
 - [x] amount of the monetary loss

Among Gneral Managers:
- [ ] Budget and general situation
- [ ] Management of the economic and storage resources
- [ ] Product promotion, marketing strategies, sale and product trends
- [ ] product sale report and mid-long term forecasts
- [ ] phytosanitary shock cases, alteration of the qualitative standards of the product
- [ ] general information on the business trends

Among the Division Managers:
- [ ] sharing resources surplus, eventually implementing horizontal recruitment

![The normal information flow](http://drive.google.com/uc?export=view&id=1LdYG-gTRuh7S49WvarfiSOBhAESmwzlF "Normal information flow")
![The information flow during shock cases](http://drive.google.com/uc?export=view&id=1JmXro9tYDzX3hZcRwl2H3xPujAJqOkDG "Information flow during shock cases")

## The MVP Information System
In the Information System, every user has access to a specific set of features based on their role.

![Different roles give different features](http://drive.google.com/uc?export=view&id=15KrPInM_RdqJ5qukDfuTArtE2lULjdpZ)

In particular, every user of a specific role can create their subordinates.
Also, the actions that the various users can take are possible through the use of forms.

![User creation and team assignment](http://drive.google.com/uc?export=view&id=15eV2lz23sd6BAB0sKYWBRjARBuiX-Wrz)
![User creation forms](http://drive.google.com/uc?export=view&id=1vb-bAT01yw3EVlqejhh6Qbr4rMfuyu2G)

The Information System uses Britecharts, which is a charting library based on the D3.js.
Information is provided both in details and in an aggregate way.

![Charts using Britecharts](http://drive.google.com/uc?export=view&id=1lR6qiwMMPT1wVxGD8xpcDzY7NVDdMOZu)

The database that has been used is MySQL and it has been modelled the following way, through the analysis of the requirements gathered from the user stories.

![CerealGreen ER Diagram](http://drive.google.com/uc?export=view&id=1kJvx2aXL4rsG_qKRT2V11QRFo6drq-j6)