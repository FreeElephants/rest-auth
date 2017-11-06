CREATE TABLE User (guid CHAR(36) NOT NULL --(DC2Type:guid)
  , email VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, passwordHash VARCHAR(255) NOT NULL, PRIMARY KEY(guid));
CREATE UNIQUE INDEX UNIQ_2DA17977E7927C74 ON User (email);
CREATE UNIQUE INDEX UNIQ_2DA17977AA08CB10 ON User (login);
INSERT INTO User VALUES (
  '2c044f97-c0a5-4267-833a-b6fedba93ffa',
  'test@mail.com',
  'test',
  '$2y$10$UvkhcHCNJn.BGLA/bMQs9eXGQqH5AxaWdEEGD6oMrULuIAe7JTREW'
), (
  'd44702cc-661e-4a2e-a696-bc378e223d85',
  'another-test@mail.com',
  'another-test',
  '$2y$10$DQsYmRI9rgug11dfuaU4ge3LbbeIMd2bNvhZ1Qu9FIVdpAG6Hh8hW'
)