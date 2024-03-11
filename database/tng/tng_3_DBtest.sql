-- 1. 사원 정보테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO employees
	(emp_no, birth_date, first_name, last_name, gender, hire_date)
VALUES
	(1, 19940613, 'Seo', 'Bowon', 'M', 20240311)
;

-- 2. 월급, 직책, 소속부서 테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO salaries
	(emp_no, salary, from_date, to_date)
VALUES
	(1, 100, 20240311, 99990101)
;

INSERT INTO titles
	(emp_no, title, from_date, to_date)
VALUES
	(1, 'Engineer', 20240311, 99990101)
;

INSERT INTO dept_emp
	(emp_no, dept_no, from_date, to_date)
VALUES
	(1, 'd001', 20240311, 99990101)
;

-- 3. 짝궁의 [1,2]것도 넣어주세요.

INSERT INTO employees
	(emp_no, birth_date, first_name, last_name, gender, hire_date)
VALUES
	(2, 20000101, 'Jung', 'Bobae', 'F', 20240311)
	,(3, 20100101, 'Lee', 'Hyunsoo', 'M', 20240311)
;

INSERT INTO salaries
	(emp_no, salary, from_date, to_date)
VALUES
	(2, 100, 20240311, 99990101)
	,(3, 100, 20240311, 99990101)
;

INSERT INTO titles
	(emp_no, title, from_date, to_date)
VALUES
	(2, 'Engineer', 20240311, 99990101)
	,(3, 'Engineer', 20240311, 99990101)
;

INSERT INTO dept_emp
	(emp_no, dept_no, from_date, to_date)
VALUES
	(2, 'd001', 20240311, 99990101)
	,(3, 'd001', 20240311, 99990101)
;

-- 4. 나와 짝궁의 소속 부서를 d009로 변경해 주세요.
UPDATE dept_emp
SET
	to_date = 20240311
WHERE 
	emp_no IN (1 , 2 ,3)
;

INSERT INTO dept_emp
	(emp_no, dept_no, from_date, to_date)
VALUES
	(1, 'd009', 20240312, 99990101)
	,(2, 'd009', 20240312, 99990101)
	,(3, 'd009', 20240312, 99990101)
;

-- 5. 짝궁의 모든 정보를 삭제해 주세요.
DELETE FROM salaries WHERE emp_no IN (2, 3);
DELETE FROM titles WHERE emp_no IN (2, 3);
DELETE FROM dept_emp WHERE emp_no IN (2, 3);
DELETE FROM employees WHERE emp_no IN (2, 3);


-- 6. 'd009'부서의 관리자를 나로 변경해 주세요.
UPDATE dept_manager
SET to_date = 20240311
WHERE emp_no = 111939
;

INSERT INTO dept_manager
	(dept_no, emp_no, from_date, to_date)
VALUES
	('d009', 1, 20240312, 99990101)
;

-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
UPDATE titles
SET to_date = 20240311
WHERE emp_no = 1
;

INSERT INTO titles
	(emp_no, title, from_date, to_date)
VALUES
	(1, 'Senior Engineer', 20240311, 99990101)
;

-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.
SELECT
	rank_tbl.emp_no, rank_tbl.first_name
FROM ( 
	SELECT
		emp.emp_no
		,emp.first_name
		,RANK() OVER(ORDER BY sal.salary DESC) sal_rank_max
		,RANK() OVER(ORDER BY sal.salary ASC) sal_ramk_min
	FROM employees emp
		JOIN salaries sal
			ON emp.emp_no = sal.emp_no
			AND sal.to_date >= NOW()
	) rank_tbl
WHERE rank_tbl.sal_rank = 1 OR rank_tbl.sal_rank = 10
;

-- 9. 전체 사원의 평균 연봉을 출력해 주세요.

-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.

-- 11. 아래 구조의 테이블을 작성하는 SQL을 작성해 주세요.
CREATE DATABASE users;

USE users;

CREATE TABLE users (
	userid 			INT				PRIMARY KEY AUTO_INCREMENT
	,username 		VARCHAR(30)		NOT NULL
	,authflg			CHAR(1) 			NOT NULL
	,birthday		DATE 				NOT NULL COMMENT 'YYYY-MM-DD'
	,created_at 	DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
);

-- 12. [01]에서 만든 테이블에 아래 데이터를 입력해 주세요.
INSERT INTO users (
	userid
	,username
	,authflg
	,birthday
	,created_at
)
VALUES (
	'자동증가'
	,'그린'
	,'0'
	,20240126
	,NOW()
);

-- 13. [02]에서 만든 레코드를 아래 데이터로 갱신해 주세요.
