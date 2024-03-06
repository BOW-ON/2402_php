-- *서브쿼리(SUB QUERY)
-- 	쿼리 안에 또 다른쿼리가 들어있는 쿼리

-- 1. WHERE 절에 사용하는 서브쿼리
--	1-1. 단일행 서브쿼리 (d001부서장의 사원 정보 출력)
SELECT *
FROM employees
WHERE
	emp_no = (
		SELECT emp_no
		FROM dept_manager
		WHERE dept_no = 'd001'
			AND to_date >= NOW()
	);
-- 1-2. 다중행 서브쿼리 (모든 부서의 부서장의 사원 정보를 출력)
SELECT *
FROM employees
WHERE
	emp_no IN (
		SELECT emp_no
		FROM dept_manager
		WHERE to_date >= NOW()
	);	
-- review) IN 연산자
SELECT * FROM employees
WHERE emp_no IN(10001, 10002, 10003);	
-- ex1) d001 부서에 속했던 적이 있는 사원의 사번과 풀네임을 출력
SELECT emp_no, CONCAT_WS(' ',last_name, first_name)
FROM employees
WHERE 
	emp_no IN (
		SELECT emp_no
		FROM dept_emp
		WHERE dept_no = 'd001'
	);
-- ex2) 현재 직책이 Senior Engineer인 사원의 사번과 생일을 출력
SELECT emp_no, birth_date
FROM employees
WHERE
	emp_no IN (
		SELECT emp_no
		FROM titles
		WHERE title = 'Senior Engineer'
			AND to_date >= NOW()
	);
-- 1-3. 다중열 서브쿼리
SELECT *
FROM dept_emp AS dpe
WHERE (dpe.dept_no, dpe.emp_no) IN (
	SELECT dpm.dept_no, dpm.emp_no
	FROM dept_manager dpm
	WHERE dpe.emp_no = dpm.emp_no
);

-- 2. SELECT에 사용하는 서브쿼리
-- 2-1. 사원의 사원 번호, 평균급여, 사원명
SELECT
	employees.emp_no
	, ( 
		SELECT AVG(salaries.salary)
		FROM salaries
		WHERE salaries.emp_no = employees.emp_no
	) avg_sal
	,employees.first_name
FROM employees;

-- 3. FROM 절에 사용되는 서브쿼리
-- 	새로운 테이블을 만들기 때문에 테이블 별칭이 필요함
SELECT tmp.*
FROM (
	SELECT emp_no, birth_date
	FROM employees
) tmp;

-- 4. INSERT 문에서 서브쿼리
INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)
VALUES (
	(SELECT MAX(emp.emp_no) +1 FROM employees emp)
	,19940613
	,'Seo'
	,'bowon',
	'M'
	,20240306
	);

-- 5. UPDATE 문에서 서브쿼리
UPDATE employees
SET
	first_name = (
		SELECT LEFT(title, 10)
		FROM titles
		WHERE emp_no = 10001
			AND to_date >= NOW()
	)
WHERE emp_no = 500000;
