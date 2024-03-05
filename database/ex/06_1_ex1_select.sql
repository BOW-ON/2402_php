-- 1. 테이블의 모든 데이터 조회 : * (Asterisk)
SELECT *
FROM employees
;
-- 실행 단축키 : F9

-- ex1) titles 테이블의 모든 데이터를 조회해 주세요.
SELECT *
FROM titles
;

-- 2. 특정 컬럼만 조회
SELECT
	emp_no
	,birth_date
FROM employees
;
-- 선택 실행 단축키 : 
-- 	블록설정후 선택실행(ctrl + F9), ;안에서 현재쿼리 실행(ctrl + shift + F9)
-- ex1) titles 테이블에서 emp_no, title을 출력해 주세요.
SELECT
	emp_no,
	title
FROM titles
;

-- 3. 특정 조건의 데이터만 조회 : WHERE 절
-- 비교연산자 : =, >=, <=, >, <, <>(같지않다-처리속도가 느려서 지양함)
-- 사번이 10009인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE	emp_no = 10009
;
-- ex1) 사원 이름이 'Mary'인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE first_name = 'Mary'
;
-- ex2) 생일이 1970/01/01 이상인 사원의 모든 정보를 조회
-- date 형식 : YYYYMMDD
SELECT *
FROM employees
WHERE birth_date >= '19600101'
;
-- ex3) 입사일이 1990/12/25 이상인 사원의 사번, 이름, 성을 조회 해주세요.
SELECT
	emp_no
	,last_name
	,first_name
FROM employees
WHERE hire_date >= '1990/12/25'
;

-- 4. 복수의 조건을 적용시켜서 조회 : AND, OR
-- 사원번호가 10005 ~ 10009 인 사원의 모든정보 조회
SELECT *
FROM employees
WHERE
	emp_no >= 10005
	AND emp_no <=10009
;
-- ex1) 사원 이름이 Mary이고, 성이 piazza 인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE
	first_name = 'Mary'
	AND last_name ='piazza'
;
-- ex2) 이름이 Mary 또는 Moto이고, 성이 piazza 인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE
	(
		first_name = 'Mary'
		OR first_name = 'Moto'
	)	
	AND last_name ='piazza'
;

-- 5. BETWEEN 연산자 : 지정한 범위의 데이터를 조회
SELECT * FROM employees
WHERE emp_no >= 10005 AND emp_no <=10009;
-- 아래와 같이 변경함
SELECT *
FROM employees
WHERE emp_no 
	BETWEEN 10005 AND 10009;
-- 6. IN 연산자 : 지정한 값과 일치한 데이터를 조회
-- 10005, 10007 사원의 모든 정보를 조회
SELECT * FROM employees
WHERE emp_no = 10005 OR emp_no = 10009;
-- 아래와 같이 변경함
SELECT *
FROM employees
WHERE emp_no IN (10005, 10009)
;

-- 7. LIKE 절 : 문자열의 내용을 조회 (대소문자 구분 X)
-- 7-1. % : 글자수 상관없이 조회
-- 이름이 ge로 끝나는 데이터 조회
SELECT *	FROM employees
WHERE first_name LIKE('%ge');
-- 이름이 ge로 시작하는 데이터 조회
SELECT *	FROM employees
WHERE first_name LIKE('ge%');
-- 이름이 ge가 포함되는 데이터 조회
SELECT *	FROM employees
WHERE first_name LIKE('%ge%');
-- 7-2. _ : 언더바의 개수 만큼의 글자의 개수가 제한되서 조회
SELECT *	FROM employees
WHERE first_name LIKE('___Ge_');

-- 8. ORDER BY 절 : 데이터를 정렬해서 조회
SELECT *	FROM employees
ORDER BY birth_date DESC, hire_date ASC;
-- ex1) 입사일이 1990/01/01 ~ 1995/12/31이고 성별이 여자인
-- 		사원의 모든 정보를 성과 이름 오름차순으로 정렬해서 조회
SELECT *
from employees
WHERE
	(hire_date BETWEEN '1990/01/01' AND '1995/12/31')
	(AND gender = 'F')
ORDER BY last_name ASC, first_name ASC;

-- 9. DISTINCT 키워드 : 검색 결과에서 중복되는 레코드 없이 조회
SELECT DISTINCT emp_no
FROM salaries
WHERE emp_no = 10001;

-- 10. GROUP BY절, HAVING 절: 그룹으로 묶어서 조회
-- GROUP BY [그룹으로 묶을 컬럼] HAVING [집계함수 조건]
-- *그룹으로 묶을 컬럼만 select해야됨(표준 문법)
-- 성별간 인원수
SELECT
	gender
	,COUNT(gender)
FROM employees
GROUP BY gender
;
-- 현재 재직중인 직원의 직책별 사원수 조회
SELECT
	title
	,COUNT(title)
FROM titles
WHERE to_date >= '2024/03/05'
GROUP BY title HAVING title LIKE('%Engineer%')
;
-- ex1) 각 사원의 최고연봉 중 80000 이상을 조회
SELECT
	emp_no
	,MAX(salary)
FROM salaries
GROUP BY emp_no HAVING MAX(salary) >= 80000
;

-- 11. AS 키워드 : 컬럼에 별칭을 부여
SELECT
	emp_no
	,MAX(salary) AS max_sal
FROM salaries sal
GROUP BY emp_no HAVING MAX(salary) >= 80000
;

-- 12. LIMIT, OFFSET : 출력하는 데이터의 개수 제한
SELECT *
FROM employees
LIMIT 5 OFFSET 10;
-- OFFSET 생략 : LIMIT 10, 5;
-- 가장 높은 연봉을 받는 사원 번호 조회
SELECT
	emp_no
	,MAX(salary) AS max_sal
FROM salaries
GROUP BY emp_no
ORDER BY max_sal DESC
LIMIT 1
;
-- ex1) 재직중인 사원 중 급여 상위 5위까지 조회
SELECT
	emp_no
	,MAX(salary) AS max_sal 
FROM salaries
WHERE to_date >='20240305'
GROUP BY emp_no
ORDER BY max_sal DESC
LIMIT 5
;
-- 정답 (그룹을 지을 필요가 없다)
SELECT emp_no, salary
FROM salaries
WHERE to_date >= '20240305'
ORDER BY salary DESC
LIMIT 5;

