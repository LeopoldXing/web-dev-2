const SearchResult = ({ result, isLoading }) => {
  return (
      <div id="content-container" className="w-full space-y-2 md:space-y-0">
        {isLoading ? (
            <em>Loading...</em>
        ) : result && Array.isArray(result) && (
            result.length > 0 ? (
                <table className="min-w-full bg-white border border-gray-200">
                  <thead>
                  <tr>
                    <th className="px-4 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600">
                      Address ID
                    </th>
                    <th className="px-4 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600">
                      Combined Address
                    </th>
                    <th className="px-4 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-sm leading-4 font-medium text-gray-600">
                      Collection Day
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  {result.map(item => (
                      <tr key={item.address_id}>
                        <td className="px-4 py-2 border-b border-gray-200 text-sm">{item.address_id}</td>
                        <td className="px-4 py-2 border-b border-gray-200 text-sm">{item.combined_address}</td>
                        <td className="px-4 py-2 border-b border-gray-200 text-sm">{item.collection_day}</td>
                      </tr>
                  ))}
                  </tbody>
                </table>
            ) : (<strong>No record found</strong>)
        )}
      </div>
  );
};

export default SearchResult;
