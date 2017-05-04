/*onoma loaner borrower trust*/

input LId

select   Borrower.BId, Borrower.Name, Percentage 
from Borrower INNER JOIN Trust

ON (2=Trust.LId and Borrower.BId=Trust.BId) 
order by Percentage DESC

/*to daneio me to megalitero amount k auto me to mikrotero k to meso oro twn poswn*/

/*to istoriko twn pliromwn m gia ta daneia mou daneio
 user provides BId*/
input BId

select * from Repayment
where Id in (select Id from Loan where BId = 13)
order by Id

/*aggregate query*/
/*to daneio me to megalitero amount k auto me to mikrotero k to meso oro twn poswn*/


select max(X), min(X), avg(X)
from
(select Loan.Id, (LoanRequest.Amount+ LoanRequest.Amount*Percentage) as X
from Loan,LoanRequest
where Loan.BId = LoanRequest.BId and LoanRequest.DateOfRequest = Loan.DateOfRequest
order by Loan.Id
)as A
/*to posa lefta xrostaei kathe borrower (sum)*/

select A.BId, X-Y
from
(
select Loan.BId, sum(LoanRequest.Amount+ LoanRequest.Amount*Percentage) as X
from Loan,LoanRequest
where Loan.BId = LoanRequest.BId and LoanRequest.DateOfRequest = Loan.DateOfRequest
group by Loan.BId
) as A,
(
select BId, sum(Amount) as Y
from   Repayment, Loan
where  Loan.Id = Repayment.Id
group by BId
) as B
where A.BId = B.BId

union /*autoi pou dn exoun plerw tpt*/

select Loan.BId, sum(LoanRequest.Amount+ LoanRequest.Amount*Percentage)
from Loan,LoanRequest, Repayment
where Loan.BId = LoanRequest.BId and LoanRequest.DateOfRequest = Loan.DateOfRequest 
and Loan.Id not in (select distinct Id from Repayment)
group by Loan.BId


/*to deadline twn daneiwn enos sigekrimenou BId prin apo kapia imerominia, dateofagreement pio prosfato*/

select A.Id, DateOfAgreement, deadline from 
(
select Id, DateOfAgreement, max(Deadline) as deadline
from Deadline
group by Id
having deadline < '2021-01-01'
) as A, Loan
where A.Id = Loan.Id and Loan.BId = 13 /*apo input*/






/*enas lender na vrei to max trust enos borrower kai to posa daneia exei parei*/
input: BId


select 13 BId, (select Name from Borrower where BId=13) Name,
avg(Trust.Percentage) AverageTrust, 
(select count(Id) 
from Loan
where BId = 13)  NumofLoans

from Trust
group by BId

/* remaining poso gia ikanopoihsh enos loan request, deadline*/
input BId, DateOfRequest





/*list pending deadlines gia lender, mexri mia hmerominia*/

input Lender, date

select A.Id, BId, deadline
from
(
select Id, DateOfAgreement, max(Deadline) as deadline
from Deadline
group by Id
having deadline < '2021-01-01' /*<----change this */
) as A, Loan

where A.Id in (
select Id from Loan,Commitment
where Commitment.LId = 18 and Loan.BId = Commitment.BId and Loan.DateOfRequest = Commitment.DateOfRequest
) and Loan.Id = A.Id






/*ola ta request pou ligoun se mia imerominia k theloun ligotera apo ena poso gia na ikanopoihthoun
*/

select * from
(
select A.BId, A.DateOfRequest, B.Deadline, (Y - X) as leftover
from
(
select BId, DateOfRequest, sum(Amount) X
from Commitment
group by BId, DateOfRequest
) A, 

(select BId, DateOfRequest, Deadline, Amount Y from LoanRequest order by BId, DateOfRequest) B

where A.BId = B.BId and A.DateOfRequest = B.DateOfRequest
order by A.BId
) Skata
where Deadline<= '2020-01-01' and leftover < '500000' and leftover>0



select Borrower.BId, Town, max(Amount) max, Description  from Borrower, LoanRequest
where Borrower.BId = LoanRequest.BId 
group by Borrower.BId
having max>150000


create view BorrowerView as 
select Borrower.BId, Name, Town, DateOfRequest, Amount
from Borrower, LoanRequest
where Borrower.BId = LoanRequest.BId




create view IntermediaryOverview as
select  Intermediary.MId, Name, count(Intermediary.MId) numofloans , avg(Amount) average
from Intermediary, Loan, LoanRequest
where Loan.MId = Intermediary.MId and Loan.DateOfRequest = LoanRequest.DateOfRequest
and Loan.BId=LoanRequest.BId
group by Intermediary.MId

/*editable*/
create view TrustView as

select Borrower.BId, Borrower.Name, Percentage 
from Borrower, Trust
where Borrower.BId=Trust.BId 
order by Percentage DESC




delimiter //
CREATE TRIGGER fullpay
AFTER INSERT ON Repayment
FOR EACH ROW
BEGIN
IF (
	SELECT sum(Amount) 
	FROM Repayment 
	WHERE New.Id=Repayment.Id)
	 >=
	(SELECT (Amount+Percentage*Amount)
	FROM LoanRequest AS LR,Loan AS L
	WHERE LR.DateOfRequest=L.DateOfRequest and LR.BId=L.BId and L.Id=New.Id
) THEN
DELETE FROM Loan WHERE Loan.Id=New.Id;
END IF;
END;
delimiter;



CREATE TRIGGER ins_check BEFORE INSERT ON Repayment
FOR EACH ROW
BEGIN
IF NEW.Amount < 0 THEN
SET NEW.Amount = 0;
END IF;
END;//

