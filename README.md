[![CircleCI](https://circleci.com/gh/jeckel/budget-poc.svg?style=svg)](https://circleci.com/gh/jeckel/budget-poc)
[![codecov](https://codecov.io/gh/jeckel/budget-poc/branch/master/graph/badge.svg)](https://codecov.io/gh/jeckel/budget-poc)
[![Twitter](https://img.shields.io/badge/Twitter-%40jeckel4-blue.svg)](https://twitter.com/jeckel4)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Julien%20Mercier--Rojas-blue.svg)](https://www.linkedin.com/in/jeckel/)

# Jeckel-Lab's Budget

# Project objectives:

- [ ] Register invoices sent to client (HT and TTC)
- [ ] See month by month total amount sent, and paid
- [ ] Each month, compare amount invoices with month's objective
- [ ] Visualize where we stand against year objective
- [ ] Optional : import invoices from Tiime application

# Architecture

- Database : Postgres
- Nginx
- PHP Fpm 7.3 alpine
- Framework:
    - Symfony 4
    - Easy Admin Bundle
- QA :
    - Codeception / BDD
    
# Database structure


**Table: `Client`**
- uuid
- name

**Table: `Invoice`**
- uuid
- client uuid
- Invoice number
- sent date
- paid date
- amount HT
- amount TTC
