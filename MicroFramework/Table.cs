using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace GenerateurDeOuf
{
    public class Table
    {
        public string TableName { get; set; }
        public string TableChange { get; set; }

        public Table(string TableName)
        {
            this.TableName = TableName;
            this.TableChange = TableName.Substring(0,1).ToUpper() + TableName.Substring(1);
        }
    }
}
