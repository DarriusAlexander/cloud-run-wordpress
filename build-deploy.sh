gcloud builds submit --tag gcr.io/cr-test-wordpress/wp:v1
gcloud beta run deploy --image gcr.io/cr-test-wordpress/wp:v1 --add-cloudsql-instances wp
gcloud beta run services delete wp
gcloud beta run deploy wp --image gcr.io/cr-test-wordpress/wp:v1 \
  --add-cloudsql-instances wp \
  --update-env-vars DB_HOST='127.0.0.1',DB_NAME=wordpress,DB_USER=wordpress,DB_PASSWORD=wordpress,CLOUDSQL_INSTANCE='fullstacknet:us-central1:wp'