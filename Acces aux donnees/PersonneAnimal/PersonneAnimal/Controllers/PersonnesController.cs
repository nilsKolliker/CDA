using AutoMapper;
using Microsoft.AspNetCore.Mvc;
using PersonneAnimal.Data.Dtos;
using PersonneAnimal.Data.Models;
using PersonneAnimal.Data.Services;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class PersonnesController:ControllerBase
    {

        private readonly PersonnesServices _service;
        private readonly IMapper _mapper;

        public PersonnesController(PersonnesServices service, IMapper mapper)
        {
            _service = service;
            _mapper = mapper;
        }

        //GET api/Personnes
        [HttpGet]
        public ActionResult<IEnumerable<PersonneDTOout>> GetAllPersonnes()
        {
            IEnumerable<Personne> listePersonnes = _service.GetAllPersonnes();
            return Ok(_mapper.Map<IEnumerable<PersonneDTOout>>(listePersonnes));
        }

        //GET api/Personnes/{i}
        [HttpGet("{id}", Name = "GetPersonneById")]
        public ActionResult<PersonneDTOout> GetPersonneById(int id)
        {
            Personne commandItem = _service.GetPersonneById(id);
            if (commandItem != null)
            {
                return Ok(_mapper.Map<PersonneDTOout>(commandItem));
            }
            return NotFound();
        }

        //POST api/Personnes
        [HttpPost]
        public ActionResult<PersonneDTOout> CreatePersonne(PersonneDTOin obj)
        {
            Personne personne = _mapper.Map<Personne>(obj);
            _service.AddPersonne(personne);
            return CreatedAtRoute(nameof(GetPersonneById), new { Id = personne.IdPersonne }, personne);
        }

        //POST api/Personnes/{id}
        [HttpPut("{id}")]
        public ActionResult UpdatePersonne(int id, PersonneDTOin obj)
        {
            Personne objFromRepo = _service.GetPersonneById(id);
            if (objFromRepo == null)
            {
                return NotFound();
            }
            _mapper.Map(obj, objFromRepo);
            _service.UpdatePersonne(objFromRepo);
            return NoContent();
        }

        // Exemple d'appel
        // [{
        // "op":"replace",
        // "path":"",
        // "value":""
        // }]
        //PATCH api/Personnes/{id}
        //[HttpPatch("{id}")]
        //public ActionResult PartialPersonneUpdate(int id, JsonPatchDocument<Personne> patchDoc)
        //{
        //    Personne objFromRepo = _service.GetPersonneById(id);
        //    if (objFromRepo == null)
        //    {
        //        return NotFound();
        //    }
        //    Personne objToPatch = _mapper.Map<Personne>(objFromRepo);
        //    patchDoc.ApplyTo(objToPatch, ModelState);
        //    if (!TryValidateModel(objToPatch))
        //    {
        //        return ValidationProblem(ModelState);
        //    }
        //    _mapper.Map(objToPatch, objFromRepo);
        //    _service.UpdatePersonne(objFromRepo);
        //    return NoContent();
        //}

        //DELETE api/Personnes/{id}
        [HttpDelete("{id}")]
        public ActionResult DeletePersonne(int id)
        {
            Personne obj = _service.GetPersonneById(id);
            if (obj == null)
            {
                return NotFound();
            }
            _service.DeletePersonne(obj);
            return NoContent();
        }


    }
}
