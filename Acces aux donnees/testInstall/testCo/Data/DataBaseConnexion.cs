using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace testCo.Data
{
    class DataBaseConnexion
    {
        public string Server { get; set; }
        public string User { get; set; }
        public string DataBase { get; set; }
        public string SslMode { get; set; }
        public string Port { get; set; }
        public string Password { get; set; }

        public DataBaseConnexion(string server, string user, string dataBase, string sslMode, string port, string password)
        {
            Server = server;
            User = user;
            DataBase = dataBase;
            SslMode = sslMode;
            Port = port;
            Password = password;
        }
    }
}
