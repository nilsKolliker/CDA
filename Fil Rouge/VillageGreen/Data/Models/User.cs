using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class User
    {
        public int IdUser { get; set; }
        public string NomUser { get; set; }
        public string PrenomUser { get; set; }
        public string EmailUser { get; set; }
        public string MdpUser { get; set; }
        public int IdRole { get; set; }

        public virtual Role Role { get; set; }
    }
}
