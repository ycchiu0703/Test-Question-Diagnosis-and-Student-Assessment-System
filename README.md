# Test Question Diagnosis and Student Assessment System
Using  the S-P chart to analyze question difficulty and student learning.

### 1. User Input

* User or teacher makes a .csv table with the correct answers of the students in a quiz.

* If the student answered correctly then enter 1, else enter 0.

![image](https://github.com/ycchiu0703/Test-Question-Diagnosis-and-Student-Assessment-System/blob/main/image/csv_sample.jpg)

### 2. User submits a CSV file and loads the csv file into HTML

![image](https://github.com/ycchiu0703/Test-Question-Diagnosis-and-Student-Assessment-System/blob/main/image/SubmitData.jpg)

### 3. Access all data with 2D array and generate raw S-P chart

![image](https://github.com/ycchiu0703/Test-Question-Diagnosis-and-Student-Assessment-System/blob/main/image/OriginalS-PForm.jpg)

### 4. Calculate the student's total score and the number of correct answers

### 5. Arrange the data into a new matrix output table according to the number of correct answers by students

![image](https://github.com/ycchiu0703/Test-Question-Diagnosis-and-Student-Assessment-System/blob/main/image/CorrectAnsbyStudents.jpg)

### 6. Arrange the data into a new matrix according to the number of correct answers to the questions and output the table

![image](https://github.com/ycchiu0703/Test-Question-Diagnosis-and-Student-Assessment-System/blob/main/image/NumofCorrectAnswers.jpg)

### 7. Generate S-P curve with CSS style

![image](https://github.com/ycchiu0703/Test-Question-Diagnosis-and-Student-Assessment-System/blob/main/image/S-PChart.jpg)

### 8. According to the formula parameters, the coefficient of difference is generated to evaluate whether this test has reference value

![image](https://github.com/ycchiu0703/Test-Question-Diagnosis-and-Student-Assessment-System/blob/main/image/GenerateCoeofDiff.jpg)

### 9. According to the formula, the attention coefficient table of the test question is generated to evaluate the level of the test question

### 10. According to the formula, the student attention coefficient table is generated to evaluate the student's grade

## References：
1.  [多點部份給分S-P表分析法在分數乘法上的應用，林亭廷(2014.06)](http://ntcuir.ntcu.edu.tw/bitstream/987654321/869/1/102NTCT0629017-001.pdf)
2.  [學生問題表分析，趙本強(2013.03.20)](http://120.107.155.180/download/PHP/SP_Chart/%e5%ad%b8%e7%94%9f%e5%95%8f%e9%a1%8c%e8%a1%a8%e5%88%86%e6%9e%90.pdf)
