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
    public class SexesController : ControllerBase
    {

        private readonly SexesServices _service;
        private readonly IMapper _mapper;

        public SexesController(SexesServices service, IMapper mapper)
        {
            _service = service;
            _mapper = mapper;
        }

        //GET api/Sexes
        [HttpGet]
        public ActionResult<IEnumerable<SexeDTOout>> GetAllSexes()
        {
            IEnumerable<Sexe> listeSexes = _service.GetAllSexes();
            return Ok(_mapper.Map<IEnumerable<SexeDTOout>>(listeSexes));
        }

        //GET api/Sexes/{i}
        [HttpGet("{id}", Name = "GetSexeById")]
        public ActionResult<SexeDTOout> GetSexeById(int id)
        {
            Sexe commandItem = _service.GetSexeById(id);
            if (commandItem != null)
            {
                return Ok(_mapper.Map<SexeDTOout>(commandItem));
            }
            return NotFound();
        }

        //POST api/Sexes
        [HttpPost]
        public ActionResult<SexeDTOout> CreateSexe(SexeDTOin obj)
        {
            Sexe sexe = _mapper.Map<Sexe>(obj);
            _service.AddSexe(sexe);
            return CreatedAtRoute(nameof(GetSexeById), new { Id = sexe.IdSexe }, sexe);
        }

        //POST api/Sexes/{id}
        [HttpPut("{id}")]
        public ActionResult UpdateSexe(int id, SexeDTOin obj)
        {
            Sexe objFromRepo = _service.GetSexeById(id);
            if (objFromRepo == null)
            {
                return NotFound();
            }
            _mapper.Map(obj, objFromRepo);
            _service.UpdateSexe(objFromRepo);
            return NoContent();
        }

        // Exemple d'appel
        // [{
        // "op":"replace",
        // "path":"",
        // "value":""
        // }]
        //PATCH api/Sexes/{id}
        [HttpPatch("{id}")]
        //public ActionResult PartialSexeUpdate(int id, JsonPatchDocument<Sexe> patchDoc)
        //{
        //    Sexe objFromRepo = _service.GetSexeById(id);
        //    if (objFromRepo == null)
        //    {
        //        return NotFound();
        //    }
        //    Sexe objToPatch = _mapper.Map<Sexe>(objFromRepo);
        //    patchDoc.ApplyTo(objToPatch, ModelState);
        //    if (!TryValidateModel(objToPatch))
        //    {
        //        return ValidationProblem(ModelState);
        //    }
        //    _mapper.Map(objToPatch, objFromRepo);
        //    _service.UpdateSexe(objFromRepo);
        //    return NoContent();
        //}

        //DELETE api/Sexes/{id}
        [HttpDelete("{id}")]
        public ActionResult DeleteSexe(int id)
        {
            Sexe obj = _service.GetSexeById(id);
            if (obj == null)
            {
                return NotFound();
            }
            _service.DeleteSexe(obj);
            return NoContent();
        }


    }
}
