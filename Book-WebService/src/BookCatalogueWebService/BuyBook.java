package BookCatalogueWebService;

import java.sql.DriverManager;
import java.sql.ResultSet;

public class BuyBook {
	public static boolean upsert(String id, String author, int sum){
		try{
			Class.forName(Connection.driver);
			java.sql.Connection con = DriverManager.getConnection(Connection.database, Connection.user, Connection.password);
			java.sql.Statement st = con.createStatement();
			ResultSet res = st.executeQuery("SELECT * FROM sold WHERE id = '"+id+"'");
			if(res.next()) {
				int total = res.getInt(3) + sum;
				int sql = st.executeUpdate("UPDATE sold SET Total = '"+total+"' WHERE id='"+id+"'");
			}else{
				int sql = st.executeUpdate("INSERT INTO sold(id, genre, total)" +
						"Values('"+id+"','"+author+"','"+sum+"') ");
			}
			return true;
		} catch (Exception e){
			System.out.println(e);
			return false;
		}
	}
}
