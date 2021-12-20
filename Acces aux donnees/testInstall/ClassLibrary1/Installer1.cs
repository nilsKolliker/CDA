using Newtonsoft.Json;
using System;
using System.Collections;
using System.Collections.Generic;
using System.ComponentModel;
using System.Configuration.Install;
using System.IO;
using System.Linq;
using System.Threading.Tasks;

namespace ClassLibrary1
{
    [RunInstaller(true)]
    public partial class Installer1 : System.Configuration.Install.Installer
    {
        public Installer1()
        {
            InitializeComponent();
        }
        public override void Install(IDictionary stateSaver)
        {
            base.Install(stateSaver);
            DataBaseConnexion DbConnect = new DataBaseConnexion(this.Context.Parameters["server"], this.Context.Parameters["user"], this.Context.Parameters["database"], this.Context.Parameters["sslmode"], this.Context.Parameters["port"], this.Context.Parameters["password"]);
            string json = JsonConvert.SerializeObject(DbConnect);
            //File.WriteAllText(".\\Parametre.json", json);
            File.WriteAllText("C:\\Users\\nilsk\\Desktop\\", json);
        }
    }
}
