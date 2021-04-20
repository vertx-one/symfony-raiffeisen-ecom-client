# symfony-smsru-notifier
Documentation: https://e-commerce.raiffeisen.ru/api/doc/ecom.html

Клиент для 

Добавляем в .env
```ini
RAIFFEISEN_IS_TEST_MODE="0"
#RAIFFEISEN_IS_TEST_MODE="1" # для тестов 
RAIFFEISEN_MERCHANT_ID="<id>"
RAIFFEISEN_MERCHANT_KEY="<key>"
```

Добавляем в конфиг

```yaml
parameters:
  raiffeisen:
    is_test_mode: '%env(RAIFFEISEN_IS_TEST_MODE)%'
    merchant_id: '%env(RAIFFEISEN_MERCHANT_ID)%'
    secret_key: '%env(RAIFFEISEN_MERCHANT_KEY)%'

services:
  VertxOne\Symfony\RaiffeisenRu\Ecom\Client:
    arguments:
      $isTestMode: @raiffeisen.mode
      $publicId: @raiffeisen.merchant_id
      $secretKey: @raiffeisen.secret_key
      
  VertxOne\Symfony\RaiffeisenRu\Ecom\PaymentLinkGenerator:
    arguments:
      $isTestMode: @raiffeisen.mode
      $publicId: @raiffeisen.merchant_id
      
  VertxOne\Symfony\RaiffeisenRu\Ecom\SignatureGenerator:
    arguments:
      $publicId: @raiffeisen.merchant_id
      $secretKey: @raiffeisen.secret_key
```