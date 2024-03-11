-- 1. 뷰(VIEW)
-- 가상테이블로, 보안과 함께 사용자의 편의성을 높이기 위해서 사용
-- 장점: 복잡한 SQL쿼리를 편하게 조회할 수 있다.
-- 단점: INDEX를 사용할 수 없어 조회 속도가 느림

-- 사원의 사번, 생년월일, 이름, 성, 성별, 입사일, 현재급여, 현재직책을 출력해주세요.
SELECT
	emp.emp_no
	,emp.birth_date
	,emp.first_name
	,emp.last_name
	,emp.hire_date
	,sal.salary
	,tit.title
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW()
;
-- 위 쿼리를 뷰로 작성
CREATE VIEW view_emp_info
AS 
	SELECT
		emp.emp_no
		,emp.birth_date
		,emp.first_name
		,emp.last_name
		,emp.hire_date
		,sal.salary
		,tit.title
	FROM employees emp
		JOIN salaries sal
			ON emp.emp_no = sal.emp_no
			AND sal.to_date >= NOW()
		JOIN titles tit
			ON emp.emp_no = tit.emp_no
			AND tit.to_date >= NOW()
;
-- 실행
SELECT * FROM view_emp_info;