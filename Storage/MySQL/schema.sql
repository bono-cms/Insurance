
/* Main issuers */
DROP TABLE IF EXISTS bono_module_insurance_issuer;
CREATE TABLE bono_module_insurance_issuer (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `phone` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL
);