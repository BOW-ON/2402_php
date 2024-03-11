-- * Index

-- 1. Index 확인
SHOW INDEX FROM employees;

-- 2. Index 생성
-- Index 없을경우 (0.141초)
SELECT * FROM employees WHERE first_name = 'Saniya';
-- Index 생성 (0.000초)
ALTER TABLE employees ADD INDEX idx_employees_first_name (first_name);
SELECT * FROM employees WHERE first_name = 'Saniya';

-- 3. Index 삭제
DROP INDEX idx_employees_first_name ON employees;
