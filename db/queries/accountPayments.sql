/**

# Fetch Account Payments

##  `LEFT JOIN`s Relatives

`Payment`, `Account`, `AccountBalance`, and `Balance`.
  
```
  AccountPayment
  - Payment
  - Account
    - Account Balance
      - Balance 
```

*/

SELECT 
	AP."ID" AS "AccountPaymentID",
	AP."Received" AS "AccountPaymentReceived",
	AP."Description" AS "AccountPaymentDescription",
	AC."ID" AS "AccountID",
	AC."Name" AS "AccountName",
	AC."Opened" AS "AccountOpened",
	AC."Closed" AS "AccountClosed",
	PA."ID" AS "PaymentID",
	PA."Amount" AS "PaymentAmount",
	PA."CurrencyID" AS "PaymentCurrencyID",
	PA."FeeAmount" AS "PaymentFeeAmount",
	PA."FeeCurrencyID" AS "PaymentFeeCurrencyID",
	PA."PaymentProcessorID" AS "PaymentProcessorID",
	PA."Received" AS "PaymentReceived",
    CUR."Symbol" AS "BalanceCurrencySymbol",
    B."Amount" AS "BalanceAmount",
    CUR."Code" AS "BalanceCurrencyCode",
    CUR."Label" AS "BalanceCurrencyLabel",
    CUR."SymbolPosition" AS "BalanceCurrencySymbolPosition",
    CUR."ThousandsSeparator" AS "BalanceCurrencyThousandsSeparator",
    CUR."DecimalSeparator" AS "BalanceCurrencyDecimalSeparator",
    CUR."DecimalPlaces" AS "BalanceCurrencyDecimalPlaces"
FROM 
	public."AccountPayments" AP
	
LEFT JOIN
	public."Payments" PA
		ON PA."ID" = AP."PaymentID"
	
LEFT JOIN
	public."Accounts" AC
		ON AC."ID" = AP."AccountID"
	
LEFT JOIN
	public."AccountBalances" AB
		ON AC."ID" = AB."AccountID"
	
LEFT JOIN
	public."Balances" B
		ON B."ID" = AB."BalanceID"
	
LEFT JOIN
	public."Currencies" CUR
		ON CUR."ID" = B."CurrencyID"
	
ORDER BY 
	AP."Received" DESC 