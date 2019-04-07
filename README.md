# Jeckel-Lab's Budget

# Project objectives:

- [ ] Register invoices sent to client (HT and TTC)
- [ ] See month by month total amount sent, and paid
- [ ] Each month, compare amount invoices with month's objective
- [ ] Visualize where we stand against year objective
- [ ] Optional : import invoices from Tiime application

Current objectives :
- month : 10 k€
- year : 100 k€

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
