-- 1. INSERT문 : 신규 데이터 저장
-- INSERT INTO 테이블명 ( 컬럼1, 컬럼2, ...)
-- VALUES ( 값1, 값2, ...);
INSERT INTO employees
	(emp_no, birth_date, first_name, last_name, gender, hire_date)
VALUES
	(500000, 20000101, 'hong', 'gildong', 'M', 20230305)
	,(500001, 20000101, 'hong', 'gildong', 'M', 20230305);

SELECT *
FROM employees
WHERE emp_no = 500002;

-- 2. SELECT INSERT : SELECT한 결과를 가지고 INSERT를 실행
INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)
SELECT
	500001
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
FROM employees
salaries
;
-- 신입 사원들의 직책 정보를 SELECT INSERT를 이용해서 저장
INSERT INTO titles(emp_no, title, from_date,to_date)
SELECT
	emp_no
	,'신입'
	,DATE(NOW())
	,DATE(99990101)
FROM employees
WHERE hire_date >= 20230305
;
-- ex1) 자신의 사원 정보를 사원 테이블에 저장
INSERT INTO employees
	(emp_no, birth_date, first_name, last_name, gender, hire_date)
VALUES (500002, 19940613, 'seo', 'bowon', 'M', 20240305);
-- ex2) 자신의 직책 정보 저장
INSERT INTO titles
	(emp_no, title, from_date, to_date)
VALUES (500002, 'Engineer', 20240305, 99990101);
-- ex3) 자신의 급여 정보 저장
INSERT INTO salaries
	(emp_no, salary, from_date, to_date)
VALUES (500002, 10000, 20240305, 99990101);
