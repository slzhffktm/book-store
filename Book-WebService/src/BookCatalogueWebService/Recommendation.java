package BookCatalogueWebService;

import org.json.JSONArray;
import org.json.JSONObject;

import java.sql.DriverManager;
import java.sql.ResultSet;

public class Recommendation {
    public static String get(String genre) {
        String result = "";

        try {
            Class.forName(Connection.driver);
            java.sql.Connection con = DriverManager.getConnection(Connection.database, Connection.user, Connection.password);
            java.sql.Statement st = con.createStatement();
            ResultSet res = st.executeQuery("SELECT sold.id AS book_id " +
                    "FROM sold INNER JOIN " +
                    "(SELECT sold.id AS book_id, MAX(total) AS maxtotal, genre " +
                    "FROM sold NATURAL JOIN genresold INNER JOIN genre ON genre.id = genresold.genre_idx " +
                    "WHERE genre = '" + genre + "') maxtot " +
                    "ON sold.id = maxtot.book_id AND sold.total = maxtot.maxtotal");

            JSONArray jsonArray = convertToJSON(res);
            result = jsonArray.toString();
        } catch (Exception e) {
            System.out.println(e);
        }
        return result;
    }

    public static JSONArray convertToJSON(ResultSet resultSet)
            throws Exception {
        JSONArray jsonArray = new JSONArray();
        while (resultSet.next()) {
            int total_rows = resultSet.getMetaData().getColumnCount();
            for (int i = 0; i < total_rows; i++) {
                JSONObject obj = new JSONObject();
                obj.put(resultSet.getMetaData().getColumnLabel(i + 1)
                        .toLowerCase(), resultSet.getObject(i + 1));
                jsonArray.put(obj);
            }
        }
        return jsonArray;
    }
}
