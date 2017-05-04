<html>
    <head >
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <link rel="stylesheet" href="jquery-ui.css">
        <script src="jquery-1.10.2.js"></script>
        <script src="jquery-ui.js"></script>
        <script>
        $(function() {
        $( "#datepicker" ).datepicker();
        });
        </script>
    </head>
    <?php /*
    **FTIA3E PRAMAAAAA!!!!!! EDW 8A NAI QUERIES TYPOU VIEW. GIA CREATE ACCOUNT (B,L,I) sign.php
    ** GIA UPDATE 8A SKEFTW KATI. GIA DELETE 8A EINAI IDIOS KWDIKAS ME TOU UPDATE. GOGOGOO
    **
    ** Edw ousiastika peirazoume gia to ka8e case (to 2o orisma sthn if)
    ** query: To query
    ** num_of_elements : O ari8mos twn sthlwn (gia mia for to 8elw)
    ** select_array : Ta stoixeia twn sthlwn
    ** ena 8ema oson afora to select array einai to gegonos oti afto p 8eloume
    ** na emfanizei den 8a nai Borrower.BId alla BId. Parola afta, mesw tou select_array
    ** kaloume to query, opote 8a xreiastei kapou olo to "Borrower.BId", otan gia paradeigma
    ** syndyazoume borrowers kai loanRequests. Vlepoume....
    **
    **
    ** Gia to editing, apo edw kai pera KA8E query 8a exei thn epilogh na pairnei opwsdhpote kai to key
    ** ths vashs an kai de 8a to emfanizei. Etsi, an kapou 8eloume na exoume se pinaka to BId, sto
    ** query 8a zhtame 2 sthles gia BId, mia gia logous editing kai mia pou 8a emfanizei. Synepws
    ** epeidh borei kapoios na exei 2 stoixeia ws 1 kleidi, ta 1-2('h kai 3) teleftaia stoixeia
    ** apo edw k pera 8a apoteloun kleidi
    ** edit=1 gia tous pinakes ws exoun
    **
    **
    */
    if (isset($_GET['skatoname']))
        $value = $_GET['skatoname'];
    if ($value == 1){//BORROWER
    $select_array = array("BId","Name","Town","StreetName","StreetNumber","PostalCode");
    $query = "SELECT * FROM Borrower";
        $num_of_elements = 6;
        $edit = 1;
        $datatable = "Borrower";
    }
    if ($value == 11){//LENDER
        $select_array = array("LId","Name","Town","StreetName","StreetNumber","PostalCode");
        $query = "SELECT * FROM Lender";
        $num_of_elements = 6;
        $edit = 1;
        $datatable = "Lender";
    }
    else if ($value == 21){//INTERMEDIARY
        $select_array = array("MId","Name","Town","StreetName","StreetNumber","PostalCode");
    $query = "SELECT * FROM Intermediary";
    $num_of_elements = 6;
        $edit = 1;
        $datatable = "Intermediary";
    }
    else if ($value == 12){//TRUST
        $select_array = array("BId","LId","Percentage");
    $query = "SELECT * FROM Trust";
    $num_of_elements = 3;
        $datatable = "Trust";
    }
    else if ($value == 2){//LOANREQUEST
        $select_array = array("BId","DateOfRequest","Deadline","Amount","PaybackPeriod","Description","Percentage");
    $query = "SELECT * FROM LoanRequest";
    $num_of_elements = 7;
    $edit = 1;
        $datatable = "Loan Request";
    }
    else if ($value == 13){//COMMITMENT
        $select_array = array("LId","BId","DateOfRequest","Amount");
    $query = "SELECT * FROM Commitment";
    $num_of_elements = 4;
    $edit = 1;
        $datatable = "Commitment";
    }
    else if ($value == 22){//LOAN
        $select_array = array("Id","DateOfApproval","MId","BId","DateOfRequest");
    $query = "SELECT * FROM Loan";
    $num_of_elements = 5;
    $edit = 1;
        $datatable = "Loan";
    }
    else if ($value == 23){//REPAYMENT
        $select_array = array("Id","DateOfPayment","Amount");
    $query = "SELECT * FROM Repayment";
    $num_of_elements = 3;
    $edit = 1;
        $datatable = "Repayment";
    }
    else if ($value == 24){//DEADLINE
        $select_array = array("Id","DateOfAgreement","Deadline");
    $query = "SELECT * FROM Deadline";
    $num_of_elements = 3;
    $edit = 1;
        $datatable = "Deadline";
    }
    else if ($value == 14){//Lender-Borrower-Trust
        $select_array = array("BId","Name","Percentage");
    $query = "select  Borrower.BId, Borrower.Name, Percentage from Borrower INNER JOIN Trust ON (Borrower.BId=Trust.BId and " . $var . "=Trust.LId) order by Percentage DESC";
    $num_of_elements = 3;
        if(isset($_GET['skatoname'])){
    echo "<form action=\"query.php\" type=\"get\">
        <div class=\"form-group\"> <label for=\"var\">LId:</label><input type=\"number\" id=\"var\" name=\"var\" placeholder=\"Your LId\"></div>
        <div class=\"form-group\"> <label for=\"value\"></label><input type=\"hidden\" id=\"value\" name=\"value\" value=\"" . $value . "\"></div>
        <input type=\"submit\"></div></form>";
        }
        }
        else if ($value == 3){//istoriko plhrwmwn
            $select_array = array("Id","DateOfPayment","Amount");
            $num_of_elements = 3;
            $query = "select * from Repayment where Id in (select Id from Loan where BId = " . $var . ") order by Id";
            if(isset($_GET['skatoname'])){
        echo "<form action=\"query.php\" type=\"get\">
            <div class=\"form-group\"> <label for=\"var\">LId:</label><input type=\"number\" id=\"var\" name=\"var\" placeholder=\"Your LId\"></div>
            <div class=\"form-group\"> <label for=\"value\"></label><input type=\"hidden\" id=\"value\" name=\"value\" value=\"" . $value . "\"></div>
            <input type=\"submit\"></div></form>";
            }
            }
            else if ($value == 15){//megalytera-mikrotera-avg daneia
                $select_array = array("Max","Min","Average");
            $num_of_elements = 3;
            $query = "select max(X) Max, min(X) Min, avg(X) Average from (select Loan.Id, (LoanRequest.Amount+ LoanRequest.Amount*Percentage) as X from Loan,LoanRequest where Loan.BId = LoanRequest.BId and LoanRequest.DateOfRequest = Loan.DateOfRequest order by Loan.Id )as A";
            }
            else if ($value == 16){//Posa xrwstaei ka8e Borrower
                $select_array = array("BId","Owes");
            $num_of_elements = 2;
            $query = "select A.BId, (X-Y) Owes
            from ( select Loan.BId, sum(LoanRequest.Amount+ LoanRequest.Amount*Percentage) as X
            from Loan,LoanRequest
            where Loan.BId = LoanRequest.BId and LoanRequest.DateOfRequest = Loan.DateOfRequest
            group by Loan.BId ) as A,
            ( select BId, sum(Amount) as Y
            from   Repayment, Loan where  Loan.Id = Repayment.Id group by BId  ) as B
            where A.BId = B.BId
            union
            select Loan.BId, sum(LoanRequest.Amount+ LoanRequest.Amount*Percentage) from Loan,LoanRequest, Repayment where Loan.BId = LoanRequest.BId and LoanRequest.DateOfRequest = Loan.DateOfRequest and Loan.Id not in (select distinct Id from Repayment) group by Loan.BId";
            }
            else if ($value == 4){//to deadline twn daneiwn enos BId prin apo kapoio date
                $select_array = array("Id","DateOfAgreement","deadline");
            $num_of_elements = 3;
            $query = "select A.Id, DateOfAgreement, deadline from
            (
            select Id, DateOfAgreement, max(Deadline) as deadline
            from Deadline
            group by Id
            having deadline < '$var2'
            ) as A, Loan
            where A.Id = Loan.Id and Loan.BId = " . $var . "";
            if(isset($_GET['skatoname'])){
            echo "<form action=\"query.php\" type=\"get\">
                <div class=\"form-group\"> <label for=\"var\">LId:</label><input type=\"number\" id=\"var\" name=\"var\" placeholder=\"Your LId\"></div>
                <div class=\"form-group\"> <label for=\"datepicker\">Date:</label><input type=\"text\" id=\"datepicker\" name=\"var2\"></div>
                <div class=\"form-group\"> <label for=\"value\"></label><input type=\"hidden\" id=\"value\" name=\"value\" value=\"" . $value . "\"></div>
                <input type=\"submit\"></div></form>";
                }
                    
            }
                else if ($value == 17){//To max trust enos borrower kai posa daneia exei parei
                    $select_array = array("BId","Name","AverageTrust","NumofLoans");
                $num_of_elements = 4;
                $query = "select " . $var . ", (select Name from Borrower where BId=" . $var . ") Name, avg(Trust.Percentage) AverageTrust, (select count(Id) from Loan where BId =" . $var . ")  NumofLoans  from Trust group by BId having BId = " . $var . " ";
                    if(isset($_GET['skatoname'])){
                echo "<form action=\"query.php\" type=\"get\">
                    <div class=\"form-group\"> <label for=\"var\">LId:</label><input type=\"number\" id=\"var\" name=\"var\" placeholder=\"Your LId\"></div>
                    <div class=\"form-group\"> <label for=\"value\"></label><input type=\"hidden\" id=\"value\" name=\"value\" value=\"" . $value . "\"></div>
                    <input type=\"submit\"></div></form>";
                    }
                }
                else if($value==5){
                    /* remaining poso gia ikanopoihsh enos loan request, deadline BId, Date*/
                    $select_array = array("Deadline","leftover");
                    $num_of_elements = 2;
                    
                    $query="
                    select LoanRequest.Deadline, (LoanRequest.Amount - sum(Commitment.Amount)) leftover
                    from Commitment, LoanRequest
                    where $var = Commitment.BId and '$var2' = Commitment.DateOfRequest
                    and LoanRequest.DateOfRequest = '$var2' and LoanRequest.BId=$var
                    ";
                    if(isset($_GET['skatoname'])){
                    echo "<form action=\"query.php\" type=\"get\">
                        <div class=\"form-group\"> <label for=\"var\">LId:</label><input type=\"number\" id=\"var\" name=\"var\" placeholder=\"Your LId\"></div>
                        <div class=\"form-group\"> <label for=\"datepicker\">Date:</label><input type=\"text\" id=\"datepicker\" name=\"var2\"></div>
                        <div class=\"form-group\"> <label for=\"value\"></label><input type=\"hidden\" id=\"value\" name=\"value\" value=\"" . $value . "\"></div>
                        <input type=\"submit\"></div></form>";
                        }
                }
                else if ($value==18){
                        /*list pending deadlines gia lender, mexri mia hmerominia, input lender date*/
                        $select_array = array("Id","BId","deadline");
                        $num_of_elements = 3;
                        
                        $query="
                        select A.Id, BId, deadline
                        from
                        (
                        select Id, DateOfAgreement, max(Deadline) as deadline
                        from Deadline
                        group by Id
                        having deadline < '$var2'
                        ) as A, Loan
                        where A.Id in (
                        select Id from Loan,Commitment
                        where Commitment.LId = $var and Loan.BId = Commitment.BId and Loan.DateOfRequest = Commitment.DateOfRequest
                        ) and Loan.Id = A.Id";
                        if(isset($_GET['skatoname'])){
                        echo "<form action=\"query.php\" type=\"get\">
                            <div class=\"form-group\"> <label for=\"var\">LId:</label><input type=\"number\" id=\"var\" name=\"var\" placeholder=\"Your LId\"></div>
                            <div class=\"form-group\"> <label for=\"datepicker\">Date:</label><input type=\"text\" id=\"datepicker\" name=\"var2\"></div>
                            <div class=\"form-group\"> <label for=\"value\"></label><input type=\"hidden\" id=\"value\" name=\"value\" value=\"" . $value . "\"></div>
                            <input type=\"submit\"></div></form>";
                            }
                }
                else if ($value==19){
                            /*ola ta request pou ligoun se mia imerominia k theloun ligotera apo ena poso gia na ikanopoihthoun
                            */
                            $select_array = array("BId","DateOfRequest","Deadline","leftover");
                            $num_of_elements = 4;
                            $query="
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
                            where Deadline<= '$var2' and leftover < $var and leftover>0";
                            if(isset($_GET['skatoname'])){
                            echo "<form action=\"query.php\" type=\"get\">
                                <div class=\"form-group\"> <label for=\"var\">Sum:</label><input type=\"number\" id=\"var\" name=\"var\" placeholder=\"Your LId\"></div>
                                <div class=\"form-group\"> <label for=\"datepicker\">Date:</label><input type=\"text\" id=\"datepicker\" name=\"var2\"></div>
                                <div class=\"form-group\"> <label for=\"value\"></label><input type=\"hidden\" id=\"value\" name=\"value\" value=\"" . $value . "\"></div>
                                <input type=\"submit\"></div></form>";
                                }
                }
                else if ($value==26){
                    $select_array = array("BId","Town","max","Description");
                            $num_of_elements = 4;
                            $query="select Borrower.BId, Town, max(Amount) max, Description  from Borrower, LoanRequest
                   where Borrower.BId = LoanRequest.BId 
                   group by Borrower.BId
                   having max>$var";
                   if(isset($_GET['skatoname'])){
                   echo "<form action=\"query.php\" type=\"get\">
                    <div class=\"form-group\"> <label for=\"var\">LId:</label><input type=\"number\" id=\"var\" name=\"var\" placeholder=\"sum\"></div>
                    <div class=\"form-group\"> <label for=\"value\"></label><input type=\"hidden\" id=\"value\" name=\"value\" value=\"" . $value . "\"></div>
                    <input type=\"submit\"></div></form>";
                    }
                }
                /*VIEWS*/
                else if ($value==25){
                            $select_array = array("MId","Name","numofloans","average");
                            $num_of_elements = 4;
                            $query="select * from IntermediaryOverview";
                    
                }                
                else if ($value==6){
                            $edit=1;
                            $select_array = array("BId","Name","Town","DateOfRequest","Amount");
                            $num_of_elements = 5;
                            $query="select * from BorrowerView";
                    
                }              
                ?>
</html>