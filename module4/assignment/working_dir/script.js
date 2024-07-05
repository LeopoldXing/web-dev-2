/******w**************

 Assignment 4 Javascript
 Name: Luping Xing
 Date: 26 June, 2024
 Description: Js file of assignment 4

 *********************/

const BASE_URL = "https://data.winnipeg.ca/resource/6rcy-9uik.json";

const searchHandler = async (event) => {
  event.preventDefault();

  // 1. loading
  const container = document.getElementById("content-container");
  container.innerHTML = "<em>Loading...</em>";

  // 2. get address keyword
  const keyword = document.getElementById("address-keyword").value;

  // 3. setup search url
  const url = `${BASE_URL}?$where=combined_address LIKE '%${keyword.toUpperCase()}%'` + '&$limit=100';
  const encodedURL = encodeURI(url);

  // 4. search
  const response = await fetch(encodedURL)

  // 5. construct response html element
  let content = "<strong>Something unexpected happened, failed to search</strong>"
  if (response.ok) {
    const jsonResponse = await response.json();
    if (jsonResponse == null || (Array.isArray(jsonResponse) && jsonResponse.length === 0)) {
      content = "<strong>No record found</strong>";
    } else if (Array.isArray(jsonResponse) && jsonResponse.length > 0) {
      content = `
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600">Address ID</th>
                        <th class="px-4 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600">Combined Address</th>
                        <th class="px-4 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600">Collection Day</th>
                    </tr>
                </thead>
                <tbody>
        `;
      jsonResponse.forEach(record => {
        content += `
                <tr>
                    <td class="px-4 py-2 border-b border-gray-200 text-sm">${record.address_id}</td>
                    <td class="px-4 py-2 border-b border-gray-200 text-sm">${record.combined_address}</td>
                    <td class="px-4 py-2 border-b border-gray-200 text-sm">${record.collection_day}</td>
                </tr>
            `;
      });
      content += `
                </tbody>
            </table>
        `;
    }
  }

  // 6. render result
  container.innerHTML = content;
}

document.addEventListener('DOMContentLoaded', () => {
  // Find the form element
  const form = document.getElementById("search-form");
  form.addEventListener("submit", searchHandler);
});
