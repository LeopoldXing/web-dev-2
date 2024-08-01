import Container from "./components/Container.jsx";
import Title from "./components/Title.jsx";
import SearchBar from "./components/SearchModule.jsx";
import SearchResult from "./components/SearchResult.jsx";
import { useState } from "react";

function App() {
  const BASE_URL = "https://data.winnipeg.ca/resource/6rcy-9uik.json";

  const [isLoading, setIsLoading] = useState(false);
  const [searchResult, setSearchResult] = useState();

  const handleSearch = async (keyword) => {
    try {
      setIsLoading(true);
      // 1. setup search url
      const url = `${BASE_URL}?$where=combined_address LIKE '%${keyword.toUpperCase()}%'` + '&$limit=100';
      const encodedURL = encodeURI(url);

      // 2. search
      const response = await fetch(encodedURL);

      // 3. parse result
      if (response.ok) {
        const result = await response.json();
        if (Array.isArray(result)) {
          setSearchResult(result);
        }
      }
    } finally {
      setIsLoading(false);
    }
  }

  return (
      <Container>
        <Title/>
        <SearchBar onSearch={handleSearch}/>
        <SearchResult result={searchResult} isLoading={isLoading}/>
      </Container>
  )
}

export default App
