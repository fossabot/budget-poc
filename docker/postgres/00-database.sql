CREATE DATABASE budget_test;

-- GRANT ALL PRIVILEGES ON budget_test.* To 'user'@'%';
GRANT CONNECT ON DATABASE budget_test TO "user";
GRANT USAGE ON SCHEMA public TO "user";
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO "user";
