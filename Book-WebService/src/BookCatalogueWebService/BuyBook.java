package BookCatalogueWebService;

import java.sql.DriverManager;
import java.sql.ResultSet;

public class BuyBook {
	public static boolean upsert(String id, String[] genres, int sum){
		try{
			Class.forName(Connection.driver);
			java.sql.Connection con = DriverManager.getConnection(Connection.database, Connection.user, Connection.password);
			java.sql.Statement st = con.createStatement();
			ResultSet res = st.executeQuery("SELECT * FROM sold WHERE id = '"+id+"'");
			if(res.next()) {
				int total = res.getInt(2) + sum;
				int sql = st.executeUpdate("UPDATE sold SET Total = '"+total+"' WHERE id='"+id+"'");
			}else{
				int sql = st.executeUpdate("INSERT INTO sold(id, total)" +
						"Values('"+id+"','"+sum+"') ");
				int err;
				for (String genre:genres) {
					try{
						genre = genre.replaceAll(" ","");
						err = st.executeUpdate("INSERT INTO genre(genre) VALUES ('"+genre+"')");
						res = st.executeQuery("SELECT id FROM genre WHERE genre = '"+genre+"'");
						res.next();
						err = st.executeUpdate("INSERT INTO genreSold (id, genre_idx) VALUES ('"+id+"', '"+res.getInt(1)+"')");
					} catch (Exception e){
						res = st.executeQuery("SELECT id FROM genre WHERE genre = '"+genre+"'");
						res.next();
						err = st.executeUpdate("INSERT INTO genreSold (id, genre_idx) VALUES ('"+id+"', '"+res.getInt(1)+"')");
					}

				}
			}
			return true;
		} catch (Exception e){
			System.out.println(e);
			return false;
		}
	}
}
