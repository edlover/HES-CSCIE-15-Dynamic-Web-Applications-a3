Tip Calculator / Bill Splitter application

This is simple bill splitter application. The user selects the number of ways
to split the check from a drop-down list, enters in the bill amount, selects
the service level (Exceptional, Good, Poor and Awful), and then clicks the
"calculate" button. A message is then displayed for the amount owned by each
party.

There is an option to round up the amount each party pays as part of their
portion. If that option is selected, then the amount owned by each party is
rounded up to the next highest dollar amount. With this option selected, the
user is also provided with the grand total amount (taking into account the
rounding by each party) that needs to be left on the table for the server.

From a Laravel perspective, there are two blades: the master and the show. The
master blade contains the basic structure of the view. The show blade contains
the specific display content in the application itself.

There are two custom controllers: BillSplitterController and TipPercentage.
BillSplitterController contains the logic necessary to retrieve the form input
from the user, performs necessary validation, performs the necessary
calculations, and then calls the show blade, passing along the necessary
variables, which allows the user to see the results.

The TipPercentage controller is a class used to provide the tip percentage
based on the service level (Exceptional, Good, Poor and Awful) selected by the
user.
