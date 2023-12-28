FROM mcr.microsoft.com/dotnet/sdk:5.0 AS build
WORKDIR /app

COPY pcheliki.shard/*.csproj ./pcheliki.shard/
RUN dotnet restore ./pcheliki.shard

COPY pcheliki.shard/. ./pcheliki.shard/
WORKDIR /app/pcheliki.shard
RUN dotnet publish -c Release -o out

FROM mcr.microsoft.com/dotnet/aspnet:5.0 AS runtime
WORKDIR /app
COPY --from=build /app/pcheliki.shard/out ./
ENTRYPOINT ["dotnet", "ServerApp.dll"]