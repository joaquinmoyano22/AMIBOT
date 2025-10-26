FROM node:20-alpine

WORKDIR /app

ENV NODE_ENV=development
RUN corepack enable

COPY package.json yarn.lock ./
RUN yarn install

COPY . .

EXPOSE 3000

CMD ["yarn", "dev"] 