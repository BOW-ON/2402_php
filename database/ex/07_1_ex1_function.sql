-- * 내장함수 (Function)
-- 	데이터를 처리하고 분석하는데 사용하는 프로그램

-- 1. 데이터 타입 변환 함수
-- CAST(값 AS 데이터타입), CONVERT(값, 데이터타입)
SELECT 123, CAST(123 AS CHAR(3)), CONVERT(123, CHAR(3));

-- 2. 제어 흐름 함수
-- IF(수식, 참일 때, 거짓일 때) : 수식이 참이면 참일때, 거짓이면 거짓일때를 출력
SELECT emp_no, gender, IF(gender ='M', '남자','여자')
FROM employees;
-- ex1) 급여가 80000 이상인 사원은 '고소득자' 아니면 '그냥저냥'으로 출력
SELECT emp_no, salary, IF(salary >=80000, '고소득자','그냥저냥') AS '고소득자/그냥저냥'
FROM salaries
WHERE to_date >= NOW()
;

-- 3. IFNULL(수식1, 수식2) :
--		값1이 NULL이면 값2를 반환
-- 	값1이 NULL이 아니면 값1을 반환 >> 문자열로 변환해서 출력
SELECT IFNULL('11', '22');
SELECT IFNULL(NULL, '22');

SELECT emp_no, IFNULL(to_date, 20000101)
FROM titles;

-- 4. NULLIF(수식1, 수식2) : 
-- 	수식1과 수식2를 비교해서 같으면 NULL을 반환
--		다르면 수식 1을 반환
SELECT NULLIF(1, 1), NULLIF(1, 2);

-- 5. CASE ~ WHEN ~ ELSE ~ AND : 다중분기를 위해 사용
SELECT
	gender
	,CASE gender
		WHEN 'M' THEN '남자'
		WHEN 'F' THEN '여자'
		ELSE '무성'
	END ko_gender
FROM employees;

-- 6. 문자열 함수(>> RETURN 값이 문자열로 반환)
-- 6-1. 문자열 연결
--	CONCAT_WS(구분자, 값1, 값2, ... )
SELECT CONCAT_WS(' , ', 11, 22);
-- ex1) 사번, 생일, 풀네임,성별, 입사일자 출력
SELECT emp_no, birth_date, CONCAT_WS(' ',last_name, first_name) full_name, gender, hire_date
FROM employees;

-- 6-2. FORMAT(숫자, 소수점 자리수) :
-- 	숫자에 ','를 넣어주고 소수점 자리수까지 표현
SELECT FORMAT(1234567.1234,2);

-- 6-3. 문자열 자르기
-- 6-3-1. LEFT(값, 길이) : 문자열의 왼쪽부터 길이만큼 잘라서 반환
-- 6-3-2. RIGHT(값, 길이) : 문자열의 왼쪽부터 길이만큼 잘라서 반환
SELECT LEFT('abcde', 2), RIGHT('abcde', 2);
--	6-3-3. SUBSTRING(문자열, 시작위치, 길이) : 문자열을 시작위치에서 길이만큼 잘라서 반환
SELECT SUBSTRING('abcde', 3, 2);
-- 6-3-4. SUBSTRING_INDEX(문자열, 구분자, 횟수)
-- 		왼쪽부터 구분자가 횟수번째 이후를 버림
--			횟수가 음수면 오른쪽부터 적용
SELECT SUBSTRING_INDEX('text.blade.txt', '.', -2);

-- 6-4. UPPER(문자열), LOWER(문자열) : 대소문자 변환
SELECT UPPER('asdfDD'), LOWER('ASDFaa');

-- 6-5-1. LPAD(문자열, 길이, 채울 문자열) : 채울 문자열을 길이만큼 왼쪽에 삽입해서 반환
SELECT LPAD(1154, 10, '0');
-- 6-5-2. RPAD(문자열, 길이, 채울 문자열) : 채울 문자열을 길이만큼 오른쪽에 삽입해서 반환
SELECT RPAD(1154, 10, '*');

--	*6-6. TRIM(문자열) : 좌우의 공백 제거해서 반환
SELECT '    asdf    ', TRIM('    asdf    ');

-- 7. 수학 함수 (>> RETURN 값이 숫자열로 반환)
-- 7-1. CEILING(값) : 올림
-- 7-2. ROUND(값) : 반올림
-- 7-3. FLOOR(값) : 버림
SELECT CEILING(1.4), ROUND(1.4), FLOOR(1.4);
-- 7-4. TRUNCATE(값, 정수)
--		소수점 기준으로 정수 위치까지 구하고 나머지 버림
SELECT TRUNCATE(1.123, 1);

-- *8. 날짜/시간 함수
-- 8-1. NOW() : 현재날짜/시간을 반환(YYYY_MM_DD hh:mi:ss)
SELECT NOW();
-- 8-2. DATE(데이트형식 값) : 해당 값을 YYYY_MM_DD로 변환
SELECT DATE(NOW());
SELECT DATE(20231231235959);
-- 8-3. ADDDATE(기준날짜, INTERVAL 추가할 날짜/시간)
-- 	기준날짜에 추가할 날짜/시간을 추가해서 반환
SELECT ADDDATE(NOW(), INTERVAL -1 YEAR);
SELECT ADDDATE(NOW(), INTERVAL -2 MONTH);
SELECT ADDDATE(NOW(), INTERVAL -3 DAY);
SELECT ADDDATE(NOW(), INTERVAL 4 HOUR);
SELECT ADDDATE(NOW(), INTERVAL 5 MINUTE);
SELECT ADDDATE(NOW(), INTERVAL 6 SECOND);
-- 8-4. SUBDATE(날짜1, INTERVAL 날짜2)
-- 8-5. ADDTIME(날짜/시간, 시간)
-- 8-5. SUBTIME(날짜/시간, 시간)

-- 9. 집계함수
-- 9-1. SUM(컬럼)
-- 9-2. MAX(컬럼)
-- 9-3. MIN(컬럼)
-- 9-4. AVG(컬럼)
-- 9-5. COUNT(컬럼) : 검색결과의 레코드 수를 출력
-- 	컬럼이 *이면 NULL포함한 총 개수를 출력
-- 	컬럼이 특정 컬럼이면 NULL 제외한 총개수를 출력
SELECT emp_no, COUNT(*), COUNT(to_date)
FROM salaries
GROUP BY emp_no;

-- 10. 순위 함수
-- 10-1. RANK() OVER(ORDER BY 컬럼 ASC/DESC)
-- 	지정한 컬럼을 기준으로 순위를 매겨서 반환.
-- 	동일한 순위가 있으면 동일한 순위를 부여함 ex) 1,1,3,4,5,5,5,8, ...
SELECT emp_no, salary, RANK() OVER(ORDER BY salary DESC) sal_rank
FROM salaries
WHERE to_date >= NOW()
LIMIT 5;
-- 10-2. ROW_NUMBER() OVER(ORDER BY 컬럼 ASC/DESC)
-- 	지정한 컬럼을 기준으로 순위를 매겨서 반환.
--	동일한 순위가 있어도 각행에 고유번호를 부여 ex) 1,2,3,4,5, ...
SELECT emp_no, salary, ROW_NUMBER() OVER(ORDER BY salary DESC) sal_rown
FROM salaries
WHERE to_date >= NOW()
LIMIT 5;



