-- 1. UPDATE 문 : 기존 데이터를 수정하는 쿼리
-- UPDATE 테이블명
-- SET
-- 	컴럼1 = 값
-- 	,컬럼2 = 값 ...
-- WHERE [조건];
UPDATE titles
SET
	title = '사장'
WHERE 
	emp_no = 500002
;
-- ex1) 직책이 '신입'인 사원의 직책을 'staff'로 변경
UPDATE titles
SET title = 'staff'
WHERE title = '신입';
-- 확인작업
SELECT * FROM titles
WHERE title = '신입';
-- ex2) 현재 급여가 40000 이하인 직원의 급여를 42000으로 변경
UPDATE salaries
SET salary = 42000
WHERE salary <= 40000 AND to_date >= NOW();

SELECT * FROM salaries
WHERE salary = 42000;
