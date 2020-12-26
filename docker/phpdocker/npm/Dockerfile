FROM alpine
WORKDIR /application
RUN apk add --update npm && npm install -g @angular/cli@9
EXPOSE 4200

# # Запуск проекта
CMD ["ng", "start"]