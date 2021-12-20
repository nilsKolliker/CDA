using System;
using System.Collections.Generic;

#nullable disable

namespace testCo.Data.Models
{
    public partial class User
    {
        public int Id { get; set; }
        public string Identifiant { get; set; }
        public string Mdp { get; set; }
        public int Role { get; set; }
    }
}
