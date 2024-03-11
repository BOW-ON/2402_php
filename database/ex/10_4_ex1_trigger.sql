-- 삭제되지 않음
-- DELETE FROM employees WHERE emp_no = 10001;
-- FK로 연결된 부분을 먼저 지우면 employees 테이블에서 삭제됨
-- DELETE FROM titles WHERE emp_no = 10001;
-- DELETE FROM employees WHERE emp_no = 10001;


-- * 트리거

-- 1. 트리거 생성
DELIMITER $$
CREATE TRIGGER trigger_employees_emp_info;
BEFORE DELETE 
ON employees
FOR EACH ROW 
BEGIN
	DELETE FROM titles WHERE emp_no = OLD.emp_no;
END $$
DELIMITER ;

DELETE FROM employees WHERE emp_no = 10002;

-- 2. 트리거 조회
SHOW TRIGGERS;

-- 3. 트리거 삭제
DROP TRIGGER trigger_employees_emp_info;