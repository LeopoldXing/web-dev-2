const Container = ({ children }) => {
  return (
      // eslint-disable-next-line no-unused-vars
      /*  global container  */
      <div className="flex justify-center items-center min-h-screen bg-cyan-50">
        {/*   card  */}
        <div className="p-6 m-3 space-y-10 bg-white rounded-3xl shadow-2xl md:p-40 md:m-40">
          {children}
        </div>
      </div>
  );
};

export default Container;
