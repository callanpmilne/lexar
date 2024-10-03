/**
# Fetch Account 
* AccountID;
* Account Name;
* Account Opened;
* Account Closed;
* TOTAL Payments Amount;
* TOTAL Fees Amount.
*/

SELECT 
	AC."ID" AS "AccountID",
	AC."Name" AS "AccountName",
	AC."Opened" AS "AccountOpened",
	AC."Closed" AS "AccountClosed",
	SUM(PA."Amount") AS "TotalPaymentsAmount",
	SUM(PA."FeeAmount") AS "TotalFeesAmount"
FROM 
	public."Accounts" AC

LEFT JOIN
	public."AccountPayments" AP
		ON AP."AccountID" = AC."ID"
	
LEFT JOIN
	public."Payments" PA
		ON PA."ID" = AP."PaymentID"

WHERE
    AC."ID" = '0d032775-d92d-46d4-8c09-8788972f70bf'

GROUP BY AC."ID"